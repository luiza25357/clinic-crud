

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clinic Patient Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">Clinic Patient Records</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">
        + Register New Patient
    </a>

    <h5>Total Patients: {{ $patients->total() }}</h5>

    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Patient Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birth Date</th>
                <th>Sex</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($patients as $patient)
                <tr>
                    <td>{{ $patient->patient_number }}</td>
                    <td>{{ $patient->first_name }}</td>
                    <td>{{ $patient->last_name }}</td>
                    <td>{{ $patient->birth_date?->format('Y-m-d') }}</td>
                    <td>{{ $patient->sex }}</td>
                    <td>{{ $patient->contact_number }}</td>

                    <td>
                        <a href="{{ route('patients.show', $patient->id) }}"
                           class="btn btn-info btn-sm text-white">
                            View
                        </a>

                        <a href="{{ route('patients.edit', $patient->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('patients.destroy', $patient->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Are you sure you want to delete this patient?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        No patients registered yet.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $patients->links() }}

</div>

</body>
</html>
