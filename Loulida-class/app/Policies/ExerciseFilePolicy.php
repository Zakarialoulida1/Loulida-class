<?php

namespace App\Policies;

use App\Models\ExerciseFile;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ExerciseFilePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ExerciseFile $exerciseFile)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ExerciseFile $exerciseFile)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ExerciseFile $exerciseFile)
    {
          return $user->id === $exerciseFile->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ExerciseFile $exerciseFile)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ExerciseFile $exerciseFile)
    {
        //
    }
}
