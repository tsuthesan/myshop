@extends('layouts.app')
<style>
    .dummy{
        border-radius: 100%;
        max-width: 100px;

    }
    #post{
        float: right;
    }
    #pro{
        float: left;
    }


</style>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger+">{{$error}}</div>
                    @endforeach
                @endif

                @if(session('response'))
                    <div class="alert alert-success">{{session('response')}}</div>
                @endif
                <div class="card">
                    <div class="card-header" >
                        <div class="col-md-4" id="pro"> Dashboard</div>
                        <div class="col-md-8" id="post">
                            <form method="POST" action='{{ url("/search") }}'>
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search for ...">
                                    <span class="input-group-sm">
                                      <button type="submit" class=" btn btn-block">
                                          Go!
                                      </button>
                                  </span>
                                </div>
                            </form>
                        </div>



                    </div>

                    <div class="card-body">
                        <div class="col-md-4"  id="pro">
                            @if (!empty($profile))
                                <img   src="{{ $profile->profile_pic }}" class="dummy" alt="" />
                            @else
                                <img src="{{url('images/dummy.jpg') }}" class="dummy" alt="" />

                            @endif
                            @if (!empty($profile))
                                <p class="lead"> {{ $profile ->name }}</p>
                            @else
                                <p> </p>

                            @endif

                            @if (!empty($profile))
                                <p class="lead"> {{ $profile ->designation }}</p>
                            @else
                                <p> </p>

                            @endif

                        </div>
                        <div class="col-md-8" id="post">
                            @if(count($posts) > 0 )
                                @foreach($posts->all() as $post)
                                    <h4 class="text-center">{{$post->post_title}}</h4>
                                    <figure class="figure">
                                        <img class="figure-img img-fluid rounded border border-dark" src="{{$post->post_image}}" alt="PostImage">
                                    </figure>

                                    <p>{{ substr($post->post_body, 0, 150 ) }}</p>

                                    <ul class="nav nav-pills">
                                        <li role="presentation">
                                            <a href='{{url("/view/{$post->id}")}}'><span  class="far fa-eye">VIEW</span></a>
                                        </li>
                                        <li role="presentation">
                                            <a href='{{url("/edit/{$post->id}")}}'><span class="far fa-edit">EDIT  </span></a>
                                        </li>
                                        <li role="presentation">
                                            <a href='{{url("/delete/{$post->id}")}}'><span class="far fa-trash-alt">DELETE</span></a>
                                        </li>
                                    </ul>

                                    <cite> Posted on: {{date ('M j, Y H:i', strtotime($post->updated_at))}}</cite>
                                    <hr/>
                                @endforeach
                            @else
                                <p> No Post Available! </p>
                            @endif



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
