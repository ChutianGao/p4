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