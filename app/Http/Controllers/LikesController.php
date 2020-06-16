<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    // 回答に参考になったを押すアクション
    public function store($id)
    {
        \Auth::user()->like($id);
        return back;
    }
}
