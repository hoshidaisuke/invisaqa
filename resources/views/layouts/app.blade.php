<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>インビザQA</title>
        <meta name="description" content="インビザラインのQ&Aサイト「インビザQA」インビザラインの質問・疑問をインビザライン体験者から回答を得ることができます。">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-172406263-2"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-172406263-2');
        </script>
    </head>

    <body>

        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

        <div class="container">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
        </div>

        {{-- フッター --}}
        @include('commons.footer')

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>