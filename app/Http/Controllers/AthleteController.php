<?php
namespace App\Http\Controllers;

use App\Models\Athlete;
use Illuminate\Http\Request;

class AthleteController extends Controller
{
    // Método para listar todos os atletas
    public function index()
    {
        $athletes = Athlete::all();
        return response()->json($athletes);
    }

    // Método para criar um novo atleta
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $athlete = Athlete::create($request->all());
        return response()->json($athlete, 201);
    }

    // Método para mostrar um atleta específico
    public function show($id)
    {
        $athlete = Athlete::find($id);

        if (is_null($athlete)) {
            return response()->json(['message' => 'Athlete not found'], 404);
        }

        return response()->json($athlete);
    }

    // Método para atualizar um atleta específico
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $athlete = Athlete::find($id);

        if (is_null($athlete)) {
            return response()->json(['message' => 'Athlete not found'], 404);
        }

        $athlete->update($request->all());
        return response()->json($athlete);
    }

    // Método para deletar um atleta específico
    public function destroy($id)
    {
        $athlete = Athlete::find($id);

        if (is_null($athlete)) {
            return response()->json(['message' => 'Athlete not found'], 404);
        }

        $athlete->delete();
        return response()->json(['message' => 'Athlete deleted successfully']);
    }
}

