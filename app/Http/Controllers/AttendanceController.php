<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AttendanceController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('attendance.index', compact('users'));
    }

    public function store(Request $request)
{
    $attendances = $request->input('attendances');  // Array of user IDs and their attendance status

    foreach ($attendances as $userId => $status) {
        // Ensure status is an integer and validate as needed
        $status = intval($status);

        // Assuming Attendance model exists and has user_id and present columns
        Attendance::updateOrCreate(
            ['user_id' => $userId],
            ['present' => $status, 'date' => now()]  // Assuming you want to store the current date and time
        );
    }

    return redirect()->back()->with('success', 'Attendance recorded successfully!');
}

    public function view()
{
    // Fetch attendance records, optionally filter by date if needed
    $attendances = Attendance::with('user')->get();

    return view('attendance.view', compact('attendances'));
}

public function filter(Request $request)
{
    $date = $request->input('date');
    $attendances = Attendance::with('user')
        ->whereDate('created_at', $date)
        ->get();

    return view('attendance.view', compact('attendances'));
}
}
