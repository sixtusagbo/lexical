<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoreController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('core.welcome');
    }

    /**
     * Display the contact page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('core.contact');
    }

    /**
     * Display the testimonial page.
     *
     * @return \Illuminate\Http\Response
     */
    public function testimonial()
    {
        return view('core.testimonial');
    }

    /**
     * Display the payment page.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment()
    {
        return view('core.payment');
    }

    /**
     * Display the faq page.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq()
    {
        return view('core.faq');
    }

    /**
     * Display the vendors page.
     *
     * @return \Illuminate\Http\Response
     */
    public function vendors()
    {
        return view('core.vendors');
    }
}
