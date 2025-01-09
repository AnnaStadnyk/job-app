<?php

namespace App\Policies;

use App\Models\Jobs\Job as Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function create(User $user): bool
    {
        return ! empty($user->employer);
    }

    public function edit(User $user, Job $job)
    {
        return $job->employer->user->is($user);
    }
}
