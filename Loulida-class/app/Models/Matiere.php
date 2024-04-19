<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    public function formations()
    {
        return $this->belongsToMany(Formation::class);
    }
    public function cycles()
    {
        return $this->belongsToMany(CycleEducative::class, 'cycle_matiere');
    }
    public function cours()
    {
        return $this->hasMany(Cours::class);
    }
    public function partners()
    {
        return $this->hasMany(Partner::class);
    }
    
}
