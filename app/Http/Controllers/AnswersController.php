<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Answer;
use App\User;
use App\Like;

class AnswersController extends Controller
{
    public function show($id)
    {

        // 投稿を取得
        $post = Post::findOrFail($id);
        $answer = Answer::where('post_id', $id)->first();
        // ユーザの投稿の一覧を作成日時の降順で取得
        $users = User::all();
        // Welcomeビューでそれらを表示
        $answers = Answer::all();
        if($answer) {
            $count_like_users = $answer->like_users()->count();
        } else {
            $count_like_users = null;
        }
        $likes = Like::all();
        return view('show.index', [
            'users' => $users,
            'answers' => $answers,
            'post' => $post,
            'likes' => $likes,
            'count_like_users' => $count_like_users,
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
