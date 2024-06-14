<?php

namespace App\Http\Controllers;

use App\Models\PersonalRecord;
use Illuminate\Http\Request;

class PersonalRecordController extends Controller
{
    public function index()
    {
        $personalRecords = PersonalRecord::with(['athlete', 'movement'])->get();
        return response()->json($personalRecords);
    }

    public function store(Request $request)
    {
        $request->validate([
            'athlete_id' => 'required|exists:athletes,id',
            'movement_id' => 'required|exists:movements,id',
            'value' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $personalRecord = PersonalRecord::create($request->all());
        return response()->json($personalRecord, 201);
    }

    public function show($id)
    {
        $personalRecord = PersonalRecord::with(['athlete', 'movement'])->find($id);

        if (is_null($personalRecord)) {
            return response()->json(['message' => 'Personal record not found'], 404);
        }

        return response()->json($personalRecord);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'athlete_id' => 'required|exists:athletes,id',
            'movement_id' => 'required|exists:movements,id',
            'value' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $personalRecord = PersonalRecord::find($id);

        if (is_null($personalRecord)) {
            return response()->json(['message' => 'Personal record not found'], 404);
        }

        $personalRecord->update($request->all());
        return response()->json($personalRecord);
    }

    public function destroy($id)
    {
        $personalRecord = PersonalRecord::find($id);

        if (is_null($personalRecord)) {
            return response()->json(['message' => 'Personal record not found'], 404);
        }

        $personalRecord->delete();
        return response()->json(['message' => 'Personal record deleted successfully']);
    }
}
