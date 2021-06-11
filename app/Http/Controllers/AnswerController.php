<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerPostRequest;
use App\Models\Question;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function store(AnswerPostRequest $request, Question $question) {

        $answer = Answer::create([
            'text' => $request->text,
            'question_id' => $question->id
        ]);

        return response()->json(['id' => $answer->id], 201);
    }

    public function destroy(Answer $answer) {
        $answer->delete();

        return response()->json(null, 204);
    }
}
