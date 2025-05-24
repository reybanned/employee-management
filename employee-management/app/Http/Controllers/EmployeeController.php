<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'birthday' => 'required|date',
            'monthly_salary' => 'required|numeric|min:0',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'birthday' => 'required|date',
            'monthly_salary' => 'required|numeric|min:0',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }

    public function summary()
    {
        $maleCount = Employee::where('gender', 'male')->count();
        $femaleCount = Employee::where('gender', 'female')->count();
        
        $totalEmployees = $maleCount + $femaleCount;
        $totalSalary = Employee::sum('monthly_salary');
        
        // get average age
        $employees = Employee::all();
        $totalAge = 0;
        
        foreach ($employees as $employee) {
            $totalAge += Carbon::parse($employee->birthday)->age;
        }
        
        $averageAge = $totalEmployees > 0 ? $totalAge / $totalEmployees : 0;

        return view('employees.summary', compact(
            'maleCount',
            'femaleCount',
            'averageAge',
            'totalSalary'
        ));
    }
}