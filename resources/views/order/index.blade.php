@extends('layouts.app')

@section('template_title')
    {{ __('Orders') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">{{ __('Orders') }}</h3>
                                <a class="btn btn-success" href="{{ route('order.create') }}">{{ __('Create New Order') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('No') }}</th>
                                    <th>{{ __('Invoice Number') }}</th>
                                    <th>{{ __('Customer Name') }}</th>
                                    <th>{{ __('Delivery Address') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Created At') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    @if($order->archived_at === null)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->invoice_number }}</td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>{{ $order->delivery_address }}</td>
                                        <td>{{ $order->status ? $order->status->name : 'N/A' }}</td>
                                        <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                                        <td>
                                            <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-sm btn-info" href="{{ route('order.show', $order->id) }}">
                                                    {{ __('Show') }}
                                                </a>

                                                <a class="btn btn-sm btn-primary" href="{{ route('order.edit', $order->id) }}">
                                                    {{ __('Edit') }}
                                                </a>

                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Are you sure?') }}')">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a href="{{ route('home') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <div class="float-right">
                            {!! $orders->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection