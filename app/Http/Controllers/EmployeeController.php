<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Rules\ValidCpf;
use App\Rules\ValidPhoneNumber;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'cpf' => ['nullable', 'string', 'unique:employees,cpf', new ValidCpf()],
                'birth_date' => 'nullable|date',
                'phone_number' => ['nullable', 'string', new ValidPhoneNumber()],
                'gender' => 'required|in:Masculino,Feminino,Outro',
            ]);
    
            Employee::create($validatedData);
    
            return redirect()->route('employees.index')->with('success', 'Funcionário cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'cpf' => ['nullable', 'string',   Rule::unique('employees', 'cpf')->ignore($employee->id), new ValidCpf()],
                'birth_date' => 'nullable|date',
                'phone_number' => ['nullable', 'string', new ValidPhoneNumber()],
                'gender' => 'required|in:Masculino,Feminino,Outro',
            ]);
    
            $employee->update($validatedData);
    
            return redirect()->route('employees.index')->with('success', 'Funcionário atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Funcionário excluído com sucesso!');
    }

}
