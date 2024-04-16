<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrectionFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'exercise_file_id',
    ];

    public function exerciseFile()
    {
        return $this->belongsTo(ExerciseFile::class);
    }
}
