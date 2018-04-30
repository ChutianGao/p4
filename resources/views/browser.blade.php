@extends('layouts.master')

@section('title')
    <h2 class="text-center">Browse & Search</h2>
@endsection

@section('errors')
    <div class="row">
        <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-3 col-sm-8 col-md-8 col-lg-6">
           @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('messages')
    <div class="row">
        <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-3 col-sm-8 col-md-8 col-lg-6">
           @if (session('messages'))
                <div class="alert alert-success">                   
                    @foreach (session('messages') as $message)
                        {{ $message }}
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection

@push('body')
    <div class="row">
        <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-3 col-xs-12 col-sm-8 col-md-8 col-lg-6">
            <form method="POST">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="searchTerm" value="{{ old('searchTerm', '') }}">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>

    <!-- List of Posts-->
    <div class="row">
        <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-3 col-xs-12 col-sm-8 col-md-8 col-lg-6">
            <div class="panel-group">
                @if(isset($posts) && sizeof($posts) > 0)
                    @foreach($posts as $post)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5>
                                    @foreach ($post->tags as $tag)
                                        <span class="label label-default">{{ $tag->name }}</span>
                                    @endforeach
                                    {{ $post->title }} <small>{{$post->published_at}}</small>
                                </h5>
                            </div>
                            <div class="panel-body">
                                {{ $post['body'] }}
                                <p class="text-right">
                                    <a class="btn btn-link" href="posts/{{ $post->id }}">Read more ...</a>
                                </p>
                            </div>                           
                        </div>
                    @endforeach
                @else
                    <h4 class="text-center">No post found.</h4>
                @endif
            </div>
        </div>
    </div>
@endpush
