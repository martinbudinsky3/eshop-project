<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Builder;

class VotingPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        $question = request()->question;

        return !Answer::where('question_id', $question->id)
                ->whereHas('votings', function(Builder $query) use($user) {
                    $query->where('user_id', $user->id);
                })
                ->exists()
            && $question->date_from <= now()
            && $question->date_to >= now();
    }
}
