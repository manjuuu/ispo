<?php

namespace App\Policies;

use App\User;
use App\Form;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->admin > 0) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the form.
     *
     * @param  \App\User  $user
     * @param  \App\Form  $form
     * @return mixed
     */
    public function view(User $user, Form $form)
    {
        if (in_array($form->id, $user->groups->pluck('id')->toArray())) {
            return true;
        }
    }

    /**
     * Determine whether the user can create forms.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the form.
     *
     * @param  \App\User  $user
     * @param  \App\Form  $form
     * @return mixed
     */
    public function update(User $user, Form $form)
    {
        if (in_array($form->id, $user->groups->pluck('id')->toArray())) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the form.
     *
     * @param  \App\User  $user
     * @param  \App\Form  $form
     * @return mixed
     */
    public function delete(User $user, Form $form)
    {
        if (in_array($form->id, $user->groups->pluck('id')->toArray())) {
            return true;
        }
    }
}
