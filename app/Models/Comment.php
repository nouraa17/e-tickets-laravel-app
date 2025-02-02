<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'ticket_id',
            'user_id',
            'comment'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
