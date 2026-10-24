<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<body>
    <h1>Students</h1>

    <p>
        Welcome, {{ auth()->user()->name }}

        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </p>

    <a href="{{ route('students.create') }}">Add Student</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->course?->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('students.show', $student->id) }}">View</a>

                        @can('update', $student)
                            <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                        @endcan

                        @can('delete', $student)
                            <form method="POST" action="{{ route('students.destroy', $student->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this student?')">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
