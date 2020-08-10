                    <ul class="list-answer">
                    <?php $i = 1; ?>
                    @foreach ($answers as $answer)
                        @if ($post->id === $answer->post_id)
                            <li>
                                <div class="alert alert-success" role="alert">
                                    <p class="initial-letter">A.<span class="small">{{ $i++ }}つ目の回答</span></p>
                                    <p>{!! nl2br(e($answer->content)) !!}</p>
                                
                                    @foreach ($users as $user)
                                        @if($answer->user_id === $user->id)
                                            <p class="user_name">名前：{{ $user->name }}</p>
                                        @endif
                                    @endforeach
                                    @if (Auth::check())
                                        @if (Auth::user()->is_like($answer->id))
                                            <p><input class="btn alert-dark" type="submit" value="参考になった" disabled></p>
                                        @else
                                            {!! Form::open(['route' => ['likes.like', $answer->id]]) !!}
                                                <p>{!! Form::submit('参考になった', ['class' => "btn btn-success"]) !!}</p>
                                            {!! Form::close() !!}
                                        @endif
                                    @endif
                                        
                                    <?php $j = 0; ?>
                                    @foreach ($likes as $like)
                                        @if ($answer->id === $like->answer_id)
                                            <?php $j++; ?>
                                        @endif
                                    @endforeach
                                    <p>参考になった人の数<em>{{ $j }}</em>人</p>
                                    @if (Auth::check())
                                        @if($answer->user_id === Auth::user()->id)
                                            <p class="micro-copy">\回答したことをつぶやこう！/</p>
                                            <a href="{{ 'https://twitter.com/intent/tweet?text=' . $post->title . '%E3%81%A8%E3%81%84%E3%81%86%E8%B3%AA%E5%95%8F%E3%81%AB%E5%9B%9E%E7%AD%94%E3%81%97%E3%81%BE%E3%81%97%E3%81%9F%EF%BC%81+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6%E3%83%A9%E3%82%A4%E3%83%B3+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6QA' .' &url=' . request()->fullUrl() }}" class="flowbtn12 widthauto fl_tw2" target="blank"
                                    ><i class="fab fa-twitter"></i><span>Twitter</span></a>
                                        @else
                                            <p class="micro-copy">\この回答をつぶやこう！/</p>
                                            <a href="{{ 'https://twitter.com/intent/tweet?text=' . $post->title . '%E3%81%A8%E3%81%84%E3%81%86%E8%B3%AA%E5%95%8F%E3%81%B8%E3%81%AE%E5%9B%9E%E7%AD%94%E3%81%8C%E5%8F%82%E8%80%83%E3%81%AB%E3%81%AA%E3%82%8A%E3%81%BE%E3%81%97%E3%81%9F%EF%BC%81+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6%E3%83%A9%E3%82%A4%E3%83%B3+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6QA' .' &url=' . request()->fullUrl() }}" class="flowbtn12 widthauto fl_tw2" target="blank"
                                    ><i class="fab fa-twitter"></i><span>Twitter</span></a>
                                        @endif
                                    @else
                                        <p class="micro-copy">\この回答をつぶやこう！/</p>
                                        <a href="{{ 'https://twitter.com/intent/tweet?text=' . $post->title . '%E3%81%A8%E3%81%84%E3%81%86%E8%B3%AA%E5%95%8F%E3%81%B8%E3%81%AE%E5%9B%9E%E7%AD%94%E3%81%8C%E5%8F%82%E8%80%83%E3%81%AB%E3%81%AA%E3%82%8A%E3%81%BE%E3%81%97%E3%81%9F%EF%BC%81+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6%E3%83%A9%E3%82%A4%E3%83%B3+%23%E3%82%A4%E3%83%B3%E3%83%93%E3%82%B6QA' .' &url=' . request()->fullUrl() }}" class="flowbtn12 widthauto fl_tw2" target="blank"
                                ><i class="fab fa-twitter"></i><span>Twitter</span></a>
                                    @endif
                                </div>
                            </li>
                        @endif
                    @endforeach
                    </ul>
                    @if ($i === 1)
                        <p>回答がまだありません</p>
                            @if (!Auth::check())
                                <p><a href="/login"><span class="material-icons">keyboard_arrow_right</span>ログインして回答する</a></p>
                                <p><a href="/signup"><span class="material-icons">keyboard_arrow_right</span>新規登録して回答する</a></p>
                            @endif
                        </li>
                    @endif