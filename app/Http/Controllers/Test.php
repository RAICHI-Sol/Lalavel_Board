<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Account;

class Test extends Controller
{
    public function index(){
        $item = Account::find(2);
        return view('test',['item' => $item]);
    }
}
