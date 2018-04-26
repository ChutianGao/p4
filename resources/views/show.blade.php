@extends('layouts.master')

@section('title')
    <h2 class="text-center">{{ $post->title }}<br><small>{{$post->published_at}}</small></h2>
@endsection

@section('errors')
    <div class="row">
        <div class="col-sm-offset-1 col-md-offset-1 col-lg-offset-2 col-xs-12 col-sm-10 col-md-10 col-lg-8">
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

@push('body')
    <div class="row">
        <div class="col-sm-offset-1 col-md-offset-1 col-lg-offset-2 col-xs-12 col-sm-10 col-md-10 col-lg-8">
            <p class="text-right">
                <a class="btn btn-success" href="/posts/{{ $post->id }}/edit"><span class="glyphicon glyphicon-pencil"></span> Edit Post</a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-1 col-md-offset-1 col-lg-offset-2 col-xs-12 col-sm-10 col-md-10 col-lg-8">
            <div class="well">
                {{ $post->body }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-1 col-md-offset-1 col-lg-offset-2 col-xs-6 col-sm-5 col-md-5 col-lg-4">
            <div class="well">
                <b>City:</b> {{ $post->city }}<br><b>State:</b> {{ $post->state }}
            </div>
        </div>
        <div class="col-xs-6 col-sm-5 col-md-5 col-lg-4">
            <div class="well">
                <b>Move-in:</b> {{ $post->movein_date }}<br><b>Term:</b> {{ $post->term }}
            </div>
        </div>
    </div>
@endpush
