<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function leave_addview()
    {
        return view('adminpanel.leave.add');
    }

    public function leave_view(Request $request)
    {
        $data = Leave::all();
        return view('adminpanel.leave.view', compact('data'));
    }

    public function leave_add(Request $request)
    {
        $request->validate([
            'employee_name' => 'required|min:2|max:30',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'number_of_day' => 'required|min:1',
            'reason' => 'required'
        ]);

        $addleave = new Leave();

        $addleave->employee_name = $request->get('employee_name');
        $addleave->from_date = $request->get('from_date');
        $addleave->to_date = $request->get('to_date');
        $addleave->number_of_day = $request->get('number_of_day');
        $addleave->reason = $request->get('reason');

        $addleave->save();
        return redirect()->back()->with('success', 'User has been added');
    }
}