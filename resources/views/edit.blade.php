@extends('layouts.master')

@section('title')
    <h2 class="text-center">Edit Post<br>
        <small>#{{ old('id', $post->id) }}</small>
    </h2>
@endsection

@section('errors')
    @include('modules.errors')
@endsection

@section('messages')
    @include('modules.messages')
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
                    <label>Title *</label>
                    <input type="text" class="form-control" maxlength="50" name="title" value="{{ old('title', $post->title) }}">
                </div>
                <div class="form-group">
                    <label>Body *</label>
                    <textarea class="form-control" name="body" maxlength="1500">{{ old('body', $post->body) }}</textarea>
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
                            <input type="text" class="form-control" maxlength="50" name="city" value="{{ old('city', $post->city) }}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                       <div class="form-group">
                            <label>State *</label>
                            <input type="text" class="form-control" maxlength="50" name="state" value="{{ old('state', $post->state) }}">
                        </div>
                    </div>
                </div>

                <!-- Date -->
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Move-in</label>
                            <input type="date" class="form-control" name="movein_date" value="{{ old('movein_date', $post->movein_date) }}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                       <div class="form-group">
                            <label>Term</label>
                            <select class="form-control" name="term">
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
                            <a class="btn btn-danger" href="/posts/{{ $post->id }}/delete">Delete</a>
                            <input type="submit" class="btn btn-primary" name="save_mode" value="Save and Publish">
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </form>
@endpush
