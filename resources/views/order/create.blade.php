@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Order') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('order.form')
        <div class="form-group">
            <label for="invoice_number">{{ __('Invoice Number') }}</label>
            <input id="invoice_number" type="text" class="form-control @error('invoice_number') is-invalid @enderror" name="invoice_number" value="{{ old('invoice_number') }}" required autofocus>
            @error('invoice_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="customer_id">{{ __('Customer') }}</label>
                <select id="customer_id" class="form-control" name="customer_id">
                    @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                    @endforeach
                    </select>
        </div>

        <div class="form-group">
            <label for="delivery_address">{{ __('Delivery Address') }}</label>
            <input id="delivery_address" type="text" class="form-control @error('delivery_address') is-invalid @enderror" name="delivery_address" value="{{ old('delivery_address') }}" required>
            @error('delivery_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="notes">{{ __('Notes') }}</label>
            <textarea id="notes" class="form-control @error('notes') is-invalid @enderror" name="notes">{{ old('notes') }}</textarea>
            @error('notes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="status_id">{{ __('Status') }}</label>
            <select id="status_id" class="form-control @error('status_id') is-invalid @enderror" name="status_id" required>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" {{ old('status_id') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                @endforeach
            </select>
            @error('status_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
            <p> </p>

            <div class="form-group">
                <label for="loaded_photo">{{ __('Loaded Photo') }}</label>
                <div class="custom-file">
                <input type="file" name="loaded_photo" id="loaded_photo" class="custom-file-input @error('loaded_photo') is-invalid @enderror">
            </div>

    @error('loaded_photo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

        </div>
        <p></p>
                                <div class="form-group">
                            <a href="{{ route('home') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                            </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
