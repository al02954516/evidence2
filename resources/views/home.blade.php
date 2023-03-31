@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          {{ __('You are logged in!') }}

          <div class="mt-4">
            <h4>Manage Users</h4>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{ route('users.index') }}" class="btn btn-primary">List of Users</a>
              <a href="{{ route('users.create') }}" class="btn btn-success">Create User</a>
            </div>
          </div>

          <div class="mt-4">
            <h4>Manage Orders</h4>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{ route('orders.index') }}" class="btn btn-primary">List of Orders</a>
              <a href="{{ route('orders.create') }}" class="btn btn-success">Create Order</a>
              <a href="{{ route('orders.archived') }}" class="btn btn-secondary">Archived Orders</a>
            </div>
            <div class="mt-4">
            <h4>Manage Customers</h4>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{ route('customers.index') }}" class="btn btn-info">List of Customers</a>
              <a href="{{ route('customers.create') }}" class="btn btn-success">Add Customer</a>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection