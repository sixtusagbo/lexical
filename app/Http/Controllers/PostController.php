<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'role.admin'])->except('show', 'index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(6);

        $data = [
            'posts' => $posts,
        ];

        return view('post.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request; //? testing

        $values = $request->validate([
            'title' => ['string', 'max:255', 'required'],
            'body' => ['string', 'max:2000', 'required'],
            'cover_image' => ['image', 'max:10240'],
        ]);

        $post = new Post();
        $post->title = $values['title'];
        $post->body = $values['body'];
        if ($request->hasFile('cover_image')) {
            // upload image to server and save name to database
            $fileExtension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $fileExtension;

            $request->file('cover_image')->storeAs('post/', $fileNameToStore, 'uploads');
        } else {
            $fileNameToStore = 'no_cover_image.png';
        }
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect()->route('blog.create')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(auth()->user()->id);
        $post = Post::find($id);
        $user_has_not_shared_today = $user->last_share_blog == null || $user->last_share_blog->diffInDays($post->created_at) >= 1;
        $valid_to_share = $user_has_not_shared_today && $post->created_at->isToday();

        $data = [
            'post' => $post,
            'valid_to_share' => $valid_to_share,
        ];

        return view('post.single')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('post.edit')->with('post', Post::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request; //? testing

        $values = $request->validate([
            'title' => ['string', 'max:255', 'required'],
            'body' => ['string', 'max:2000', 'required'],
            'cover_image' => ['image', 'max:10240'],
        ]);

        $post = Post::find($id);
        $post->title = $values['title'];
        $post->body = $values['body'];
        if ($request->hasFile('cover_image')) {
            // delete old image if any
            if ($post->cover_image != 'no_cover_image.png') {
                Storage::disk('uploads')->delete('post/' . $post->cover_image);
            }

            // get file extension
            $fileExtension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $fileExtension;
            // upload image to server
            $request->file('cover_image')->storeAs('post/', $fileNameToStore, 'uploads');
            // save name to database
            $post->cover_image = $fileNameToStore;
        }
        $post->update();

        return redirect()->route('blog.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()->route('blog.create')->with('success', 'Post deleted successfully');
    }

    /**
     * Save user's last blog share.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_blog_share()
    {
        $user = User::find(auth()->user()->id);
        $post = Post::find(request()->input('post_id'));

        $user_has_not_shared_today = $user->last_share_blog == null || $user->last_share_blog->diffInDays($post->created_at) >= 1;
        $valid_to_share = $user_has_not_shared_today && $post->created_at->isToday();

        if ($valid_to_share) {
            $user->last_share_blog = Carbon::now();
            $user->update();
        }

        return response('done');
    }
}
