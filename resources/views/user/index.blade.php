@extends('layouts.app')

@section('template_title')
    {{ __('Users') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">{{ __('Users') }}</h3>
                            <a class="btn btn-primary" href="{{ route('users.create') }}">{{ __('Create New User') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Role') }}</th>
                                    <th>{{ __('Active') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            {{ $user->email }}
                                        
                                        </td>
                                        <td>{{ $user->role->name }}</td>
                                        <td>{{ $user->active ? __('Yes') : __('No') }}</td>
                                        <td>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary" href="{{ route('users.edit', $user->id) }}">
                                                    {{ __('Edit') }}
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Are you sure?') }}')">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a href="{{ route('home') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                            </div>
                    </div>

                    <div class="card-footer clearfix">
                        <div class="float-right">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection