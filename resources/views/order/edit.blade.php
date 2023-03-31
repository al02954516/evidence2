@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Order
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Order</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('orders.update', $order->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('order.form')

                            <div class="form-group">
                                <label for="invoice_number">{{ __('Invoice Number') }}</label>
                                <input id="invoice_number" type="text" class="form-control{{ $errors->has('invoice_number') ? ' is-invalid' : '' }}" name="invoice_number" value="{{ old('invoice_number', $order->invoice_number) }}" required autofocus>

                                @if ($errors->has('invoice_number'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('invoice_number') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">
                                    <label for="customer_id">{{ __('Customer') }}</label>
                                                        <select id="customer_id" class="form-control" name="customer_id">
                                                            @foreach($customers as $customer)
                                                        <option value="{{ $customer->id }}" {{ $customer->id == $order->customer_id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                                                    @endforeach
                                                            </select>
                                                                    </div>
                            <div class="form-group">
                                    <label for="status_id">{{ __('Status') }}</label>
                                                        <select id="status_id" class="form-control" name="status_id">
                                                            @foreach($statuses as $status)
                                                        <option value="{{ $status->id }}" {{ $status->id == $order->status_id ? 'selected' : '' }}>{{ $status->name }}</option>
                                                                    @endforeach
                                                            </select>
                                                                    </div>

                                <div class="form-group">
                                <label for="delivery_address">{{ __('Delivery Address') }}</label>
                                <textarea id="delivery_address" class="form-control{{ $errors->has('delivery_address') ? ' is-invalid' : '' }}" name="delivery_address" required>{{ old('delivery_address', $order->delivery_address) }}</textarea>
                                    @if ($errors->has('delivery_address'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('delivery_address') }}</strong>
                                    </span>
                                @endif
                                </div>

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
                                <label for="delivered_photo">{{ __('Delivered Photo') }}</label>
                                <div class="custom-file">
                                <input type="file" name="delivered_photo" id="delivered_photo" class="custom-file-input @error('delivered_photo') is-invalid @enderror">
                                </div>

                                @error('delivered_photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <p></p>
                                <div class="form-group">
                            <a href="{{ route('home') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                            </div>
                        </form>
                    </div>
                            </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection

