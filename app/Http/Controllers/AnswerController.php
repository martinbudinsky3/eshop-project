<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Validation\Rule;

class AnswerController extends Controller
{
    public function store(Request $request, Question $question) {
        $request->validate([
            'text' => ['required', 'string',
                Rule::unique('answers')->where(function ($query) use($question) {
                    return $query->where('question_id', $question->id);
                })
            ],
        ]);

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
