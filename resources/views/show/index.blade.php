@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <ul class="breadcrumb">
            <li>
                <a href="/">トップ</a>
            </li>
            <li><span class="material-icons">keyboard_arrow_right</span></li>
            <li>質問詳細ページ</li>
        </ul>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @include('show.question')
                @include('show.answer_show')

    </div>
</div>
@include('show.answer_create')

<div class="row justify-content-center">
    <div class="col-md-8 back-link">
        <a href="/"><span class="material-icons">keyboard_arrow_right</span>TOPに戻る</a>
    </div>
</div>

@endsection