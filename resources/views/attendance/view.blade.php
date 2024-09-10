@extends('layouts.admin')

@section('main')

<!DOCTYPE html>
<html>
<head>
    <title>Attendance Sheet</title>
    <style>
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        input[type="date"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            margin-bottom: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            color: green;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Attendance</h1>
    
    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <!-- <input type="date" name="date" value="{{ old('date', $date) }}" required> -->
        <input type="date" name="date" value="{{ old('date', $date) }}" required>
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Present</th>
                    <th>Absent</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>
                    <input type="radio" name="attendances[{{ $user->id }}]" value="present" id="present_{{ $user->id }}"
                        {{ isset($attendances[$user->id]) && $attendances[$user->id] === 'present' ? 'checked' : '' }}>
                    <label for="present_{{ $user->id }}"></label>
                </td>
                <td>
                    <input type="radio" name="attendances[{{ $user->id }}]" value="absent" id="absent_{{ $user->id }}"
                        {{ isset($attendances[$user->id]) && $attendances[$user->id] === 'absent' ? 'checked' : '' }}>
                    <label for="absent_{{ $user->id }}"></label>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <button type="submit">Save Attendance</button>
    </form>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
</body>
</html>

@endsection