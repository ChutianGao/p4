@extends('layouts.master')

@section('title')
    <h2 class="text-center">Confirm to proceed ...</h2>
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
            <p class="text-center">Are you sure you want to delete <strong>{{ $post->title }}</strong>?</p>

            <form method='POST' action='/posts/{{ $post->id }}'>
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <p class="text-center">
                    <input type='submit' value='Yes, delete this post' class='btn btn-danger'>
                    <a type="button" href='/posts/{{ $post->id }}/edit'>No, I changed my mind</a>
                </p>
            </form>
        </div>
    </div>
    <br>
@endpush
