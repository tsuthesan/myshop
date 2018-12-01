@extends('layouts.app')
<style>
    .dummy{
        border-radius: 100%;
        max-width: 100px;

    }

</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif

            @if(session('response'))
                <div class="alert alert-success">{{session('response')}}</div>
            @endif
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="col-md-4">
                        <img src="{{url('images/dummy.jpg' )}}" class="dummy" alt="" />
                    </div>
                    <div class="col-md-4"></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
