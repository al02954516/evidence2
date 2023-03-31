@extends('layouts.app')

@section('template_title')
    {{ __('Edit') }} {{ $user->name ?? '' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Edit') }} {{ $user->name ?? '' }}</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control" name="password">
                            </div>

                            <div class="form-group">
                                <label for="role_id">{{ __('Role') }}</label>
                                <select id="role_id" class="form-control @error('role_id') is-invalid @enderror" name="role_id" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>

                            <div class="form-group">
                                <label for="active">{{ __('Active') }}</label>
                                <select id="active" class="form-control" name="active" required>
                                    <option value="1" {{ $user->active == 1 ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                    <option value="0" {{ $user->active == 0 ? 'selected' : '' }}>{{ __('No') }}</option>
                                </select>
                            </div>

                            <p></p>
                            <div class="form-group">
                                <a href="{{ route('home') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection