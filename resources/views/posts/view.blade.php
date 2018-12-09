@extends('layouts.app')
<style>
    #post{
        float: right;
    }#pro{
         float: left;
     }



</style>


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-2">


                <div class="card">
                    <div class="card-header text-center">Post View </div>

                    <div class="card-body">
                        <div class="col-md-4"  id="pro">
                            <ul class="list-group">
                                @if(count($categories) > 0)
                                    @foreach ($categories ->all() as $category)
                                    <li class="list-group-item"><a href='{{ url("category/{$category->id}") }}'>{{$category -> category}}</a></li>
                                    @endforeach
                                @else
                                        <p> NO Category Found !</p>
                                    @endif
                            </ul>
                        </div>
                        <div class="col-md-8" id="post">
                            @if(count($posts) > 0 )
                                @foreach($posts->all() as $post)
                                    <h4 class="text-center">{{$post->post_title}}</h4>
                                    <figure class="figure">
                                        <img class="figure-img img-fluid rounded border border-dark" src="{{$post->post_image}}" alt="PostImage">
                                    </figure>

                                    <p>{{$post->post_body }}</p>

                                    <ul class="nav nav-pills">
                                        <li role="presentation">
                                            <a href='{{url("/like/{$post->id}")}}'><span  class="fas fa-thumbs-up">Like()</span></a>
                                        </li>
                                        <li role="presentation">
                                            <a href='{{url("/dislike/{$post->id}")}}'><span class="fas fa-thumbs-down">Dislike()  </span></a>
                                        </li>
                                        <li role="presentation">
                                            <a href='{{url("/comment/{$post->id}")}}'><span class="far fa-comment">Comment()</span></a>
                                        </li>
                                    </ul>



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
