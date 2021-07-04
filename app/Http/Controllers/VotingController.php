<?php

namespace App\Http\Controllers;

use App\Http\Requests\VotingPostRequest;
use App\Models\Question;
use App\Models\Voting;
use Illuminate\Support\Facades\Auth;

class VotingController extends Controller
{
    public function store(VotingPostRequest $request, Question $question) {
        $voting = Voting::create([
            'user_id' => Auth::id(),
            'answer_id' => $request->answer_id,
            'date' => now(),
        ]);

        $request->session()->flash('message', 'Odpoveď bola úspešne zaznamenaná.');

        return redirect('/');
    }
}
