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
        <div class="card">
            <h2 class="card-header">インビザラインのアンケート</h2>
            <div class="card-body">
                <h3>インビザラインやってよかった？</h3>
                <blockquote class="twitter-tweet"><p lang="ja" dir="ltr">聞きにくいことを聞いちゃいます！<br>インビザラインやってよかった？<br><br>対象：治療終了、もしくは歯を動かし終わった人</p>&mdash; やす🦷インビザライン矯正6/52 (@wfoMY4eLIQtyHn1) <a href="https://twitter.com/wfoMY4eLIQtyHn1/status/1290066447650000898?ref_src=twsrc%5Etfw">August 2, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                <h3>インビザライン気づかれた？</h3>
                <blockquote class="twitter-tweet"><p lang="ja" dir="ltr">インビザラインを初めてから2ヵ月ほど経ちますが嫁以外誰にもいってないんですが、思った以上に気づかれないですね。<br>もちろんコロナでマスクしてるせいもありますが。<br><br>みなさん、言ってないのにインビザライン気づかれたことありますか？</p>&mdash; やす🦷インビザライン矯正6/52 (@wfoMY4eLIQtyHn1) <a href="https://twitter.com/wfoMY4eLIQtyHn1/status/1289191004482854913?ref_src=twsrc%5Etfw">July 31, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                <h3>インビザライン中の歯の痛みについて</h3>
                <blockquote class="twitter-tweet"><p lang="ja" dir="ltr">インビザラインしてる人は歯が痛いか気になったので聞いてみます！</p>&mdash; やす🦷インビザライン矯正6/52 (@wfoMY4eLIQtyHn1) <a href="https://twitter.com/wfoMY4eLIQtyHn1/status/1286086143310622720?ref_src=twsrc%5Etfw">July 22, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
             　 <h3>終わったアライナー捨てる？</h3>
             　 <blockquote class="twitter-tweet"><p lang="ja" dir="ltr">今日から3つ目です。まだまだガタガタです。<br><br>そういえば、皆さん終わったアライナーは捨てるのでしょうか？<br>取っておいても何もすることない様な気がするのですが取っておいてます笑</p>&mdash; やす🦷インビザライン矯正6/52 (@wfoMY4eLIQtyHn1) <a href="https://twitter.com/wfoMY4eLIQtyHn1/status/1276362559226970113?ref_src=twsrc%5Etfw">June 26, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                <h3>ロキソニン飲んでる？</h3>
                <blockquote class="twitter-tweet"><p lang="ja" dir="ltr">【アンケートお願いします🙇‍♂️】<br><br>インビザライン1日目で早くも痛みが💦動かしてるので当然のことですよね😭<br><br>特に外す時が歯も一緒に取れそうです笑<br><br>痛みのあまりロキソニンを飲んでしまったのですが、あまり常用しない方がいいよなと思いつつ。。<br><br>インビザラインをつけてる最中、痛みがあるので</p>&mdash; やす🦷インビザライン矯正6/52 (@wfoMY4eLIQtyHn1) <a href="https://twitter.com/wfoMY4eLIQtyHn1/status/1270531033897680897?ref_src=twsrc%5Etfw">June 10, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>

        <ul class="snsbtniti2">
            <li><a href="https://twitter.com/intent/tweet?text=%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6%E3%83%A9%E3%82%A4%E3%83%B3%E3%81%AEQ%26A%E3%82%B5%E3%82%A4%E3%83%88%E3%80%8C%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6QA%E3%80%8D&url=https://invisaqa.herokuapp.com/" class="flowbtn12 fl_tw2"
            ><i class="fab fa-twitter"></i><span>Twitter</span></a></li>
            <li><a href="//timeline.line.me/social-plugin/share?url=https://invisaqa.herokuapp.com/" class="flowbtn12 fl_li2"><i class="fab fa-line"></i><span>LINE</span></a></li>
            <li><a href="http://b.hatena.ne.jp/add?mode=confirm&url=https://invisaqa.herokuapp.com/" class="flowbtn12 fl_hb2"><i class="fas fa-bold"></i><span>Hatena</span></a></li>
        </ul>
        <p style="margin-top: 30px;">※医学的なご質問は信頼できる医師にご相談ください。</p>
    </div>
</div>

@endsection