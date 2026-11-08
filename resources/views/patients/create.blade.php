
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Register New Patient</h2>

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Patient Number</label>
            <input type="text" name="patient_number"
                class="form-control" value="{{ old('patient_number') }}" required>
        </div>

        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="first_name"
                class="form-control" value="{{ old('first_name') }}" required>
        </div>

        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="last_name"
                class="form-control" value="{{ old('last_name') }}" required>
        </div>

        <div class="mb-3">
            <label>Birth Date</label>
            <input type="date" name="birth_date"
                class="form-control" value="{{ old('birth_date') }}" required>
        </div>

        <div class="mb-3">
            <label>Sex</label>
            <select name="sex" class="form-control" required>
                <option value="">Select Sex</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Contact Number</label>
            <input type="text" name="contact_number"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Save Patient
        </button>

        <a href="{{ route('patients.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>
@endsection
