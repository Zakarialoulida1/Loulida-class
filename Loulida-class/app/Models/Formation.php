<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'cycle_educative_id',
        'available_place',
        'price',
        'duration_months',
        'description',
  'image',
  'name'
        // Add other fillable fields as needed
    ];

    public function cycleEducative()
    {
        return $this->belongsTo(CycleEducative::class);
    }

    public function matieres()
    {
        return $this->belongsToMany(Matiere::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
