                    <div class="alert alert-dark" role="alert">
                        <h2 class="initial-letter q"><span>Q.</span><span>{{ $post->title }}</span></h2>
                        <p>{!! nl2br(e($post->content)) !!}</p>
                        
                        @foreach ($users as $user)
                             @if($post->user_id === $user->id)
                                 <p class="user_name">名前：{{ $user->name }}</p>
                             @endif
                        @endforeach
                        <p class="micro-copy">\Twitterで回答を集めよう！/</p>
                        @if (Auth::check())
                            @if($post->user_id === Auth::user()->id)
                                <a href="{{ 'https://twitter.com/intent/tweet?text=' . $post->title . '%E3%81%A8%E3%81%84%E3%81%86%E8%B3%AA%E5%95%8F%E3%81%AE%E5%9B%9E%E7%AD%94%E3%82%92%E5%8B%9F%E9%9B%86%E3%81%97%E3%81%A6%E3%81%84%E3%81%BE%E3%81%99%EF%BC%81+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6%E3%83%A9%E3%82%A4%E3%83%B3+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6QA' .' &url=' . request()->fullUrl() }}" class="flowbtn12 widthauto fl_tw2" target="blank"
                        ><i class="fab fa-twitter"></i><span>Twitter</span></a>
                            @else
                                <a href="{{ 'https://twitter.com/intent/tweet?text=' . $post->title . '%E3%81%A8%E3%81%84%E3%81%86%E8%B3%AA%E5%95%8F%E3%81%8C%E3%81%82%E3%82%8A%E3%81%BE%E3%81%99%EF%BC%81+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6%E3%83%A9%E3%82%A4%E3%83%B3+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6QA' .' &url=' . request()->fullUrl() }}" class="flowbtn12 widthauto fl_tw2" target="blank"
                        ><i class="fab fa-twitter"></i><span>Twitter</span></a>
                            @endif
                        @else
                            <a href="{{ 'https://twitter.com/intent/tweet?text=' . $post->title . '%E3%81%A8%E3%81%84%E3%81%86%E8%B3%AA%E5%95%8F%E3%81%8C%E3%81%82%E3%82%8A%E3%81%BE%E3%81%99%EF%BC%81+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6%E3%83%A9%E3%82%A4%E3%83%B3+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6QA' .' &url=' . request()->fullUrl() }}" class="flowbtn12 widthauto fl_tw2" target="blank"
                        ><i class="fab fa-twitter"></i><span>Twitter</span></a>
                        @endif
                    </div>