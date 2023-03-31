@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Search Order by Invoice #') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('orders.search') }}">
            @csrf
            <div class="form-group">
              <input type="text" name="invoice_number" class="form-control" id="invoice_number" placeholder="Enter invoice number">
            </div>

            <p></p>

            <button type="submit" class="btn btn-primary">Search</button>
          </form>

          @if (isset($order))
            <div class="mt-4">
              <h4>Order Details</h4>
              <p>Invoice #: {{ $order->invoice_number }}</p>

              @if ($order->status == 'Delivered')
                <p>Delivery Photo: <img src="{{ asset($order->delivered_photo) }}" /></p>
              @elseif ($order->status == 'In process')
                <p>Process Name: {{ $order->process_name }}</p>
                <p>Process Date: {{ $order->process_date }}</p>
              @endif
            </div>
          @elseif (session('status'))
            <div class="alert alert-info">{{ session('status') }}</div>
          @endif
          
        </div>
        @if (auth()->check())
        <a href="{{ route('home') }}" class="btn btn-primary">User Dashboard</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection