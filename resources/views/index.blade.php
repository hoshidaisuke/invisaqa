@extends('layouts.app')

@section('content')

<div class="main-image">
    <img src="./img/invisaqa_main.png" alt="インビザラインQ&A">
</div>
@if (Auth::check())
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">インビザラインの質問</h2>
                <div class="card-body">
                    
                        {!! Form::model($posts, ['route' => 'posts.store']) !!}
                            <div class="form-group">
                                {!! Form::label('title', 'タイトル') !!}
                                {!! Form::text('title', '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('content', '質問') !!}
                                {!! Form::textarea('content', '', ['class' => 'form-control', 'rows' => '3' ]) !!}
                            </div>
                            {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
@endif

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <h2 class="card-header">インビザラインのQ&A</h2>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <ul class="question">
                    @foreach($posts as $post)
                        <li>{!! link_to_route('show.index', $post->title,  ['id' => $post->id] ) !!}</li>
                    @endforeach
                </ul>
                {{-- ページネーションのリンク --}}
                {{ $posts->links() }}
            </div>
        </div>

        <ul class="snsbtniti2">
            <li><a href="https://twitter.com/intent/tweet?text=%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6%E3%83%A9%E3%82%A4%E3%83%B3%E3%81%AEQ%26A%E3%82%B5%E3%82%A4%E3%83%88%E3%80%8C%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6QA%E3%80%8D&url=https://invisaqa.herokuapp.com/" class="flowbtn12 fl_tw2"
            ><i class="fab fa-twitter"></i><span>Twitter</span></a></li>
            <li><a href="//timeline.line.me/social-plugin/share?url=https://invisaqa.herokuapp.com/" class="flowbtn12 fl_li2"><i class="fab fa-line"></i><span>LINE</span></a></li>
            <li><a href="http://b.hatena.ne.jp/add?mode=confirm&url=https://invisaqa.herokuapp.com/" class="flowbtn12 fl_hb2"><i class="fas fa-bold"></i><span>Hatena</span></a></li>
        </ul>
    </div>
</div>

@endsection