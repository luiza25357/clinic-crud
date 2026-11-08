
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Edit Patient Information</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patients.update', $patient->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Patient Number</label>
            <input type="text" name="patient_number" class="form-control"
                   value="{{ old('patient_number', $patient->patient_number) }}" required>
        </div>

        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control"
                   value="{{ old('first_name', $patient->first_name) }}" required>
        </div>

        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control"
                   value="{{ old('last_name', $patient->last_name) }}" required>
        </div>

        <div class="mb-3">
            <label>Birth Date</label>
            <input type="date" name="birth_date" class="form-control"
                   value="{{ old('birth_date', $patient->birth_date?->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label>Sex</label>
            <select name="sex" class="form-control" required>
                <option value="Male" {{ old('sex', $patient->sex) == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('sex', $patient->sex) == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Contact Number</label>
            <input type="text" name="contact_number" class="form-control"
                   value="{{ old('contact_number', $patient->contact_number) }}">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control">{{ old('address', $patient->address) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Patient</button>

        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>

    </form>

</div>

</body>
</html>
