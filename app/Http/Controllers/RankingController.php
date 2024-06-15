<?php
namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\PersonalRecord;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function getRanking($movementId)
    {
        $movement = Movement::find($movementId);

        if (!$movement) {
            return response()->json(['error' => 'Movement not found'], 404);
        }

        $records = PersonalRecord::where('movement_id', $movementId)
            ->orderBy('value', 'desc')
            ->with('athlete')
            ->get()
            ->unique('athlete_id'); // Seleciona apenas o melhor valor de cada atleta

        $ranking = [];
        $previousValue = null;
        $position = 0;
	  
        foreach ($records as $record) {
          if ($record->value !== $previousValue) {
                $position++;
            }
            $ranking[] = [
                'position' => $position,
                'athlete' => $record->athlete->name,
                'value' => $record->value,
                'date' => $record->date
            ];
              $previousValue = $record->value;
        }

        return response()->json([
            'movement' => $movement->name,
            'ranking' => $ranking
        ]);
    }
}
