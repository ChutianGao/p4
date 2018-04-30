@extends('layouts.master')

@section('title')
    <h2 class="text-center">Create Post</h2>
@endsection

@section('errors')
    <div class="row">
        <div class="col-xs-offset-1 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-10 col-sm-6 col-md-6 col-lg-6">
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
        <div class="col-xs-offset-1 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-10 col-sm-6 col-md-6 col-lg-6">
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
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-offset-1 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-10 col-sm-6 col-md-6 col-lg-6">
        <!-- General -->
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" maxlength="50" name="title" value="{{ old('title', '') }}" required>
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea class="form-control" name="body" maxlength="1500" required>{{ old('body', '') }}</textarea>
        </div>

        <!-- Tags -->
        <div class="form-group">
            <label>Tags</label><br>
            @foreach($tagsForCheckboxes as $tag_id => $tag_name)
                <label>
                    <input
                        {{ (in_array($tag_id, $tags)) ? 'checked' : '' }}
                        type='checkbox'
                        name='tags[]'
                        value='{{ $tag_id }}'>
                    {{ $tag_name }}
                </label>                    
            @endforeach
        </div>


        <!-- Location -->
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" maxlength="50" value="{{ old('city', '') }}">
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">
                    <label>State</label>
                    <input type="text" class="form-control" name="state" maxlength="50" value="{{ old('state', '') }}" required>
                </div>
            </div>
        </div>

        <!-- Date -->
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label>Move-in</label>
                    <input type="date" class="form-control" name="movein_date" value="{{ old('movein_date', date('Y-m-d')) }}"  required>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">
                    <label>Term</label>
                    <select class="form-control" name="term" required>
                        <option></option>
                        <option value="< 1 month"
                            {{ (old('term', '') == '< 1 month') ? "selected" : "" }}
                        >< 1 month</option>
                        <option value="1 months - 2 months"
                            {{ (old('term', '') == '1 months - 2 months') ? "selected" : "" }}
                        >1 months - 2 months</option>
                        <option value="3 months - 6 months"
                            {{ (old('term', '') == '3 months - 6 months') ? "selected" : "" }}
                        >3 months - 6 months</option>
                        <option value="7 months - 9 months"
                            {{ (old('term', '') == '7 months - 9 months') ? "selected" : "" }}
                        >7 months - 9 months</option>
                        <option value="10 months - 12 months"
                            {{ (old('term', '') == '10 months - 12 months') ? "selected" : "" }}
                        >10 months - 12 months</option>
                        <option value="> 12 months"
                            {{ (old('term', '') == '> 12 months') ? "selected" : "" }}
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
        <br>
    </form>
@endpush
