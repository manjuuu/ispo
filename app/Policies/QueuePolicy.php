<?php

namespace App\Policies;

use App\User;
use App\Queue;
use Illuminate\Auth\Access\HandlesAuthorization;

class QueuePolicy
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
    public function view(User $user, Queue $queue)
    {
        if (in_array($queue->group_id, $user->groups->pluck('id')->toArray())) {
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
    public function update(User $user, Queue $queue)
    {
        if (in_array($queue->id, $user->groups->pluck('id')->toArray())) {
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
    public function delete(User $user, Queue $queue)
    {
        if (in_array($queue->id, $user->groups->pluck('id')->toArray())) {
            return true;
        }
    }
}
