@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Details</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
            <p class="card-text">
                <strong>Gender:</strong> {{ ucfirst($employee->gender) }}<br>
                <strong>Age:</strong> {{ \Carbon\Carbon::parse($employee->birthday)->age }} years<br>
                <strong>Birthday:</strong> {{ $employee->birthday->format('F j, Y') }}<br>
                <strong>Monthly Salary:</strong> ${{ number_format($employee->monthly_salary, 2) }}
            </p>
            
            <div class="d-flex gap-2">
                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('employees.destroy', $employee) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection