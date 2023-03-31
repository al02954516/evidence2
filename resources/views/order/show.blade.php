@extends('layouts.app')

@section('template_title')
    {{ $order ? $order->name : __('Show Order') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show Order') }}</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="invoice_number">{{ __('Invoice Number') }}</label>
                            <input id="invoice_number" type="text" class="form-control" name="invoice_number" value="{{ $order->invoice_number }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="customer">{{ __('Customer') }}</label>
                            <input id="customer" type="text" class="form-control" name="customer" value="{{ $order->customer->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="delivery_address">{{ __('Delivery Address') }}</label>
                            <input id="delivery_address" type="text" class="form-control" name="delivery_address" value="{{ $order->delivery_address }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="notes">{{ __('Notes') }}</label>
                            <textarea id="notes" class="form-control" name="notes" readonly>{{ $order->notes }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="status_id">{{ __('Status') }}</label>
                            @if($order->status_id == 1)
                                <input id="status_id" type="text" class="form-control" name="status_id" value="Ordered" readonly>
                            @elseif($order->status_id == 2)
                                <input id="status_id" type="text" class="form-control" name="status_id" value="In process" readonly>
                            @elseif($order->status_id == 3)
                                <input id="status_id" type="text" class="form-control" name="status_id" value="En route" readonly>
                            @elseif($order->status_id == 4)
                                <input id="status_id" type="text" class="form-control" name="status_id" value="Delivered" readonly>
                            @else
                                <input id="status_id" type="text" class="form-control" name="status_id" value="Unknown" readonly>
                            @endif
                        </div>
                        
                        <div class="form-group">
                        <label for="created_at">{{ __('Created At') }}</label>
                        <input id="created_at" type="text" class="form-control" name="created_at" value="{{ $order->created_at }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="updated_at">{{ __('Last Updated At') }}</label>
                        <input id="updated_at" type="text" class="form-control" name="updated_at" value="{{ $order->updated_at }}" readonly>
                    </div>

                        <p></p>
                        <div class="form-group">
                            <label for="loaded_photo">{{ __('Loaded Photo: ') }}</label><br>
                            @if ($order->loaded_photo)
                                <img src="{{ asset('storage/' . $order->loaded_photo) }}" alt="Loaded Photo">
                            @else
                                <p>No photo uploaded.</p>
                            @endif
                        </div>
                        <p></p>
                        <div class="form-group">
                            <label for="loaded_photo">{{ __('Delivered Photo: ') }}</label><br>
                            @if ($order->delivered_photo)
                                <img src="{{ asset('storage/' . $order->delivered_photo) }}" alt="Delivered Photo">
                            @else
                                <p>No photo uploaded.</p>
                            @endif
                        </div>
                        <p></p>
                                <div class="form-group">
                            <a href="{{ route('home') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection