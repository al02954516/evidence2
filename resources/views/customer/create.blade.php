@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Customer
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Add') }} Customer</span>
                    </div>
                    <div class="card-body">

                    <div>
                        <form method="POST" action="{{ route('customers.store') }}"  role="form" enctype="multipart/form-data">
                        <p></p>
                            @csrf

                            @include('customer.form')
                            <p></p>
                    </div>
                    
                        </form>
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
