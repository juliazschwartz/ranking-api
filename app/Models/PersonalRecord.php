<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalRecord extends Model
{
    use HasFactory;

    protected $fillable = ['athlete_id', 'movement_id', 'value', 'date'];

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }

    public function movement()
    {
        return $this->belongsTo(Movement::class);
    }
}

