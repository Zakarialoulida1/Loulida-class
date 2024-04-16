<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'cours_id',
        'user_id',
    ];

  

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    public function correctionFiles()
    {
        return $this->hasMany(CorrectionFile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


