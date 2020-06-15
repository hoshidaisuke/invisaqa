@extends('layouts.app')

@section('content')

<div class="container">
    @if (Auth::check())
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h2 class="card-header">質問</h2>
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
                <h2 class="card-header">インビザラインのQ&A一覧</h2>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        @foreach($posts as $post)
                            <li>{!! link_to_route('show.index', $post->title,  ['id' => $post->id] ) !!}</li>
                        @endforeach
                    </ul>
                    {{-- ページネーションのリンク --}}
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection