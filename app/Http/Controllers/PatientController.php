<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'mobile_number' => 'required|string',
        'name' => 'required|string',
        'age' => 'required|integer',
        'gender' => 'required|in:male,female,other',
    ]);

    $patient = Patient::create([
        'mobile_number' => $request->mobile_number,
        'name' => $request->name,
        'age' => $request->age,
        'gender' => $request->gender,
    ]);

    // Return JSON if AJAX, else redirect
    if ($request->expectsJson()) {
        return response()->json(['success' => true, 'patient' => $patient]);
    }

    return redirect()->back()->with('success', 'Patient added successfully!');
}
public function showAddMedicine(Patient $patient)
{
    return view('Content.add_medicine', compact('patient'));
}
public function storeMedicine(Request $request, $patientId)
{
    $request->validate([
        'medicines' => 'required|array|min:1',
        'medicines.*.name' => 'required|string',
        'medicines.*.dose' => 'required|string',
        'price' => 'required|numeric',
    ]);

    // Convert medicines array to associative array: name => dose
    $medicines = [];
    foreach ($request->medicines as $med) {
        $medicines[$med['name']] = $med['dose'];
    }

    \App\Models\Medicine::create([
        'patient_id' => $patientId,
        'medicines' => $medicines,
        'price' => $request->price,
    ]);

    return redirect()->route('give.medicine')->with('success', 'Medicine record saved!');
}
}