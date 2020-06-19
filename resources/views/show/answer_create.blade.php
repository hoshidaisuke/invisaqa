    @if (Auth::check())
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">この質問に回答する</h2>
                <div class="card-body">
                    
                    {!! Form::model($post, ['route' => 'answers.store']) !!}
                     <div class="form-group">
                            {!! Form::textarea('content', '', ['class' => 'form-control', 'rows' => '3' ]) !!}
                            {{Form::hidden('post_id', $post->id)}}
                        </div>
                        {!! Form::submit('回答する', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
    @endif