<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    public function index()
    {
        $movements = Movement::all();
        return response()->json($movements);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $movement = Movement::create($request->all());
        return response()->json($movement, 201);
    }

    public function show($id)
    {
        $movement = Movement::find($id);

        if (is_null($movement)) {
            return response()->json(['message' => 'Movement not found'], 404);
        }

        return response()->json($movement);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $movement = Movement::find($id);

        if (is_null($movement)) {
            return response()->json(['message' => 'Movement not found'], 404);
        }

        $movement->update($request->all());
        return response()->json($movement);
    }

    public function destroy($id)
    {
        $movement = Movement::find($id);

        if (is_null($movement)) {
            return response()->json(['message' => 'Movement not found'], 404);
        }

        $movement->delete();
        return response()->json(['message' => 'Movement deleted successfully']);
    }
}

