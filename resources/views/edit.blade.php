@extends('layouts.master')

@section('title')
    <h2 class="text-center">Edit Post<br>
        <small>#{{ old('id', $post->id) }}</small>
    </h2>
@endsection

@section('errors')
    <div class="row">
        <div class="col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-sm-6 col-md-6 col-lg-6">
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
        <div class="col-sm-offset-2 col-md-offset-3 col-lg-offset-3 col-sm-8 col-md-6 col-lg-6">
           @if (isset($messages) && sizeof($messages) > 0)
                <div class="alert alert-success">                   
                    @foreach ($messages as $message)
                        {{ $message }}
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection

@push('body')
    <!-- Form -->
    <form class="form-horizontal" role="form" method="POST">
        {{ method_field('put') }}
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-sm-6 col-md-6 col-lg-6">
                <!-- General -->
            
                    
                        <div class="form-group">
                            <label>I am looking for ...</label>
                            <select class="form-control" name="post_type" required>
                                <option></option>
                                <option value="roommates" 
                                    {{ (old('post_type', $post->post_type) == 'roommates') ? "selected" : "" }}
                                >Roomate(s)</option>
                                <option value="apartment"
                                    {{ (old('post_type',  $post->post_type) == 'apartment') ? "selected" : "" }}
                                >Apartment</option>
                            </select>
                        </div>
                
                
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" maxlength="50" name="title" value="{{ old('title', $post->title) }}" required>
                </div>
                <div class="form-group">
                    <label>Body</label>
                    <textarea class="form-control" name="body" maxlength="1500" required>{{ old('body', $post->body) }}</textarea>
                </div>

                <!-- Location -->
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" maxlength="50" name="city" value="{{ old('city', $post->city) }}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                       <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control" maxlength="50" name="state" value="{{ old('state', $post->state) }}" required>
                        </div>
                    </div>
                </div>

                <!-- Date -->
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Move-in</label>
                            <input type="date" class="form-control" name="movein_date" value="{{ old('movein_date', $post->movein_date) }}"  required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                       <div class="form-group">
                            <label>Term</label>
                            <select class="form-control" name="term" required>
                                <option></option>
                                <option value="< 1 month"
                                    {{ (old('term', $post->term) == '< 1 month') ? "selected" : "" }}
                                >< 1 month</option>
                                <option value="1 months - 2 months"
                                    {{ (old('term', $post->term) == '1 months - 2 months') ? "selected" : "" }}
                                >1 months - 2 months</option>
                                <option value="3 months - 6 months"
                                    {{ (old('term', $post->term) == '3 months - 6 months') ? "selected" : "" }}
                                >3 months - 6 months</option>
                                <option value="7 months - 9 months"
                                    {{ (old('term', $post->term) == '7 months - 9 months') ? "selected" : "" }}
                                >7 months - 9 months</option>
                                <option value="10 months - 12 months"
                                    {{ (old('term', $post->term) == '10 months - 12 months') ? "selected" : "" }}
                                >10 months - 12 months</option>
                                <option value="> 12 months"
                                    {{ (old('term', $post->term) == '> 12 months') ? "selected" : "" }}
                                >> 12 months</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Buttons -->
                <hr>
                <div class="row">
                    <div class="text-right">
                        <div class="btn-group">
                            <input type="submit" class="btn btn-primary" name="save_mode" value="Save and Publish">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endpush
