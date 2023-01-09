<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'amount',
        'acc_name',
        'bank',
        'acc_num',
        // ?0-Pending, 1-Successful, 2-Failed
        'status',
        'remark',
        'user_id',
    ];

    /**
     * A withdrawal belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
