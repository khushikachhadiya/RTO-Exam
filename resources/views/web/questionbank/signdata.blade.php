@foreach ($signs as $sign)
    <div class="col-md-4 col-sm-6">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <img src="{{ asset('assets/image/ts-upload/ts-' . $sign->image) }}" 
                     alt="{{ $sign->title }}" 
                     class="img-fluid mx-auto d-block mb-2" 
                     style="max-height:120px;">
                <h6>{{ $sign->title }}</h6>
            </div>
        </div>
    </div>
@endforeach
