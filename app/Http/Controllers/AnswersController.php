<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Answer;
use App\User;

class AnswersController extends Controller
{
    public function show($id)
    {

        $data = [];
        // 投稿を取得
        $post = Post::findOrFail($id);
        // ユーザの投稿の一覧を作成日時の降順で取得
        $answers = Answer::all();
        $users = User::all();
        // Welcomeビューでそれらを表示
        return view('show.index', [
            'users' => $users,
            'answers' => $answers,
            'post' => $post
        ]);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);
        $post = Post::findOrFail($request->post_id);
        // 認証済みユーザ（閲覧者）の投稿に対する回答として作成
        $post->answers()->create([
            'user_id' => $request->user()->id,
            'post_id' => $request->post_id,
            'content' => $request->content,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
    
}
