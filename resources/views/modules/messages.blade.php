<div class="row">
    <div class="col-sm-offset-2 col-md-offset-3 col-lg-offset-3 col-sm-8 col-md-6 col-lg-6">
       @if (session('messages'))
            <div class="alert alert-success">                   
                @foreach (session('messages') as $message)
                    {{ $message }}
                @endforeach
            </div>
        @endif
    </div>
</div>