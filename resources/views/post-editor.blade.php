@extends('layouts.master')

@section('title')
    <h2 class="text-center">Post Editor</h2>
@endsection

@section('errors')
    <div class="row">
        <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-3 col-xs-12 col-sm-8 col-md-8 col-lg-6">
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
    <!-- Form -->
    <form class="form-horizontal" role="form">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-offset-1 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-10 col-sm-6 col-md-6 col-lg-6">
        <!-- General -->
        <div class="form-group">
            <label>I am looking for ...</label>
            <select class="form-control">
                <option></option>
                <option>Roomates</option>
                <option>Apartment</option>
            </select>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea  class="form-control"></textarea>
        </div>

        <!-- Location -->
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" class="form-control">
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">
                    <label>State</label>
                    <select name="state" class="form-control">
                        <option></option>
                        <option value="MA">MA</option>
                        <option value="NH">NH</option>
                        <option>NY</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Date -->
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label>Move-in</label>
                    <input type="date" name="movein_date" class="form-control">
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">
                    <label>Term</label>
                    <select class="form-control">
                        <option></option>
                        <option>< 1 month</option>
                        <option>1 months - 2 months</option>
                        <option>3 months - 6 months</option>
                        <option>7 months - 9 months</option>
                        <option>10 months - 12 months</option>
                        <option>> 12 months</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Buttons -->
        <hr>
        <div class="row">
            <div class="text-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default">Save and Post</button>
                </div>
            </div>
        </div>
    </form>
@endpush
