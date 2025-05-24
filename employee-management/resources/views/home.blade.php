@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('You are logged in!') }}</p>
                    
                    <div class="d-grid gap-3 mt-4">
                        <a href="{{ route('employees.summary') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-chart-bar me-2"></i> View Employee Summary
                        </a>
                        
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-users me-2"></i> Manage Employees
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection