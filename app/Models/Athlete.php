<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function personalRecords()
    {
        return $this->hasMany(PersonalRecord::class);
    }
}
