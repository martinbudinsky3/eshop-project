<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request, Question $question) {
        $request->validate([
            'text' => 'unique:answers,text|required|string',
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
