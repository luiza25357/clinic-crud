<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Display all patients
    public function index()
    {
        $patients = Patient::latest()->paginate(10);

        return view('patients.index', compact('patients'));
    }

    // Show registration form
    public function create()
    {
        return view('patients.create');
    }

    // Save new patient
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_number' => 'required|unique:patients,patient_number',
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required|date|before_or_equal:today',
            'sex' => 'required|in:Male,Female',
            'contact_number' => 'nullable',
            'address' => 'nullable',
        ]);

        Patient::create($validated);

        return redirect()->route('patients.index')
            ->with('success', 'Patient registered successfully!');
    }

    // View patient details
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    // Display edit form
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    // Update patient information
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'patient_number' => 'required|unique:patients,patient_number,' . $patient->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required|date|before_or_equal:today',
            'sex' => 'required|in:Male,Female',
            'contact_number' => 'nullable',
            'address' => 'nullable',
        ]);

        $patient->update($validated);

        return redirect()->route('patients.index')
            ->with('success', 'Patient updated successfully!');
    }

    // Delete patient
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', 'Patient deleted successfully!');
    }
}