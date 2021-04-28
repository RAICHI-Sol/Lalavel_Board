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
}
