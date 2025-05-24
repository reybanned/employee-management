@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Summary</h1>
    
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Gender Distribution</div>
                <div class="card-body">
                    <h5 class="card-title">Male: {{ $maleCount }}</h5>
                    <h5 class="card-title">Female: {{ $femaleCount }}</h5>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Average Age</div>
                <div class="card-body">
                    <h2 class="card-title">{{ number_format($averageAge, 1) }} years</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Total Monthly Salary</div>
                <div class="card-body">
                    <h2 class="card-title">${{ number_format($totalSalary, 2) }}</h2>
                </div>
            </div>
        </div>
    </div>
    
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to Employee List</a>
</div>
@endsection