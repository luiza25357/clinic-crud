
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Patient Details</h2>

    <div class="card mt-3">
        <div class="card-body">

            <p><strong>Patient Number:</strong> {{ $patient->patient_number }}</p>
            <p><strong>First Name:</strong> {{ $patient->first_name }}</p>
            <p><strong>Last Name:</strong> {{ $patient->last_name }}</p>
            <p><strong>Birth Date:</strong> {{ $patient->birth_date?->format('Y-m-d') }}</p>
            <p><strong>Sex:</strong> {{ $patient->sex }}</p>
            <p><strong>Contact Number:</strong> {{ $patient->contact_number ?? 'N/A' }}</p>
            <p><strong>Address:</strong> {{ $patient->address ?? 'N/A' }}</p>

            <a href="{{ route('patients.edit', $patient->id) }}"
               class="btn btn-warning">Edit Patient</a>

            <a href="{{ route('patients.index') }}"
               class="btn btn-secondary">Back</a>

        </div>
    </div>

</div>

</body>
</html>
