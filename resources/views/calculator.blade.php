@extends('layouts.master')

@section('title')
    <h2 class="text-center">Bill Splitter</h2>
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
    <!-- Calculator Form -->
    <form method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-3 col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                    <input type="number"
                           name="charged"
                           class="form-control"
                           placeholder="Charged Total"
                           value="{{ ($charged) ? $charged : old('charged') }}"
                           step="0.01">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="number"
                           name="numberPeople"
                           class="form-control"
                           placeholder="Numer of People"
                           value="{{ ($numberPeople) ? $numberPeople : old('numberPeople') }}">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-scale"></i></span>
                    <select name="tipsRate" class="form-control">
                        <option value="" {{ (old('tipsRate') == '' || $tipsRate == '') ? 'selected' : ''}}>Tips Rate</option>
                        <option value="15" {{ (old('tipsRate') == '15' || $tipsRate == '15') ? 'selected' : ''}}>Normal Lunch - 15%</option>
                        <option value="18" {{ (old('tipsRate') == '18' || $tipsRate == '18') ? 'selected' : ''}}>Normal Dinner - 18%</option>
                        <option value="20" {{ (old('tipsRate') == '20' || $tipsRate == '20') ? 'selected' : ''}}>Amazing - 20%</option>
                        <option value="10" {{ (old('tipsRate') == '10' || $tipsRate == '10') ? 'selected' : ''}}>Not Satisfied - 10%</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <p class="text-center">
                <br><label class="checkbox-inline"><input type="checkbox"
                                                          name="roundUp"
                                                          {{ (old('roundUp') || $roundUp) ? 'checked' : '' }}
                                                    >Round Up</label>
                <br>
                <br>
                <input type="submit" class="btn btn-primary" name="submit" value="Calculate">
            </p>
        </div>
    </form>

    <!-- Display Result -->
    <div class="row">
        <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-3 col-xs-12 col-sm-8 col-md-8 col-lg-6">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="well">                        
                        <h4>All Together</h4>
                        <p>
                            <label>Charged:</label> $ {{ $charged }}<br>
                            <label>Tips:</label> $ {{ $tips }}<br>
                            <label>Total:</label> $ {{ $total }}
                        </p>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="well">                        
                        <h4>Per Person</h4>
                        <p>
                            <label>Charged:</label> $ {{ $chargedPp}}<br>
                            <label>Tips:</label> $ {{ $tipsPp}}<br>
                            <label>Owns:</label> $ {{ $totalPp}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush