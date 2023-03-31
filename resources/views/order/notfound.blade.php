@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Order Not Found') }}</div>

                <div class="card-body">
                    <p>{{ __('The order by the inserted invoice number does not exist.') }}</p>
                    <div class="form-group">
                            <a href="{{ route('welcome') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                            </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection