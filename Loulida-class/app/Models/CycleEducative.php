<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CycleEducative extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
     
    ];
    // public function cours()
    // {
    //     return $this->hasMany(Cours::class);
    // }
    public function matieres()
    {
        return $this->belongsToMany(Matiere::class, 'cycle_matiere');
    }
    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
    
}
