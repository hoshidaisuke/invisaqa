@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul class="breadcrumb">
                <li>
                    <a href="/">トップ</a>
                </li>
                <li><span class="material-icons">keyboard_arrow_right</span></li>
                <li>質問詳細ページ</li>
            </ul>
            <div class="card">
                <h2 class="card-header">インビザライン質問</h2>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-dark" role="alert">
                    <p class="initial-letter">Q.</p>
                    <p>{{ $post->content }}</p>
                    
                    @foreach ($users as $user)
                         @if($post->user_id === $user->id)
                             <p class="user_name">名前：{{ $user->name }}</p>
                         @endif
                    @endforeach
                    </div>
                    <ul class="list-answer">
                    <?php $i = 0; ?>
                    @foreach ($answers as $answer)
                        
                        @if ($post->id === $answer->post_id)
                            <li>
                                <div class="alert alert-success" role="alert">
                                    <p class="initial-letter">A.{{ $i++ }}</p>
                                    <p>{{ nl2br(e($answer->content)) }}</p>
                                
                                    @foreach ($users as $user)
                                        @if($answer->user_id === $user->id)
                                            <p class="user_name">名前：{{ $user->name }}</p>
                                        @endif
                                    @endforeach
                                    {!! Form::open(['route' => ['user.set_like', $user->id]]) !!}
                                        {!! Form::submit('参考になった', ['class' => "btn btn-danger btn-block"]) !!}
                                    {!! Form::close() !!}
                                </div>
                            </li>
                        @endif
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::check())
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">答え</h2>
                <div class="card-body">
                    
                    {!! Form::model($post, ['route' => 'answers.store']) !!}
                     <div class="form-group">
                            {!! Form::textarea('content', '', ['class' => 'form-control', 'rows' => '3' ]) !!}
                            {{Form::hidden('post_id', $post->id)}}
                        </div>
                        {!! Form::submit('答える', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
        
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8 back-link">
            <a href="/"><span class="material-icons">keyboard_arrow_right</span>TOPに戻る</a>
        </div>
    </div>
</div>


@endsection