<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    protected $table = 'Board';

    protected $fillable = [
        'board_name',
        'create_userid',
        'watcher',
    ];

    Public function user()
    {
      return $this->belongsTo('App\Models\User','create_userid');
    }

    Public function comment()
    {
      return $this->hasOne('App\Models\BoardComment','board_id');
    }
}
