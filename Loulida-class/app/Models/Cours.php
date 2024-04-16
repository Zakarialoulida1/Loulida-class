<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'matiere_id',
        'cycle_educative_id',
        'user_id',
  ];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function cycleEducative()
    {
        return $this->belongsTo(CycleEducative::class);
    }

    public function coursFiles()
    {
        return $this->hasMany(CoursFile::class);
    }

    public function exerciseFiles()
    {
        return $this->hasMany(ExerciseFile::class);
    }
}
