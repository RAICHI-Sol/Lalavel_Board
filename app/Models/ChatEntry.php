<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatEntry extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'chat_entry';
    protected $fillable = [
        'boardid',
        'userid',
    ];

    Public function user()
    {
      return $this->belongsTo('App\Models\User','userid');
    }
}
