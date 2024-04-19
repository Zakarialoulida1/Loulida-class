<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', // 'teacher' or 'investor'
        'phone',
        'description',
        'cv',
        'user_id',
        'Address',
        'Social_Media',
        'matiere_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}
