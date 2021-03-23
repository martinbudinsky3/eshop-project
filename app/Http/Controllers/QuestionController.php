<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\QuestionPostRequest;

class QuestionController extends Controller
{
    public function index() {
        $recordsPerPage = request('recordsPerPage', 5);
        $page = request('page', 1);
        $offset = ($page - 1) * $recordsPerPage;

        $questions = Question::skip($offset)
            ->orderBy('date_from', 'desc')
            ->take($recordsPerPage)
            ->get();

        $count = Question::count();

        return response()->json(['count' => $count, 'questions' => $questions], 200);
    }

    public function edit(Question $question) {
        return response()->json([$question], 200);
    }

    public function store(QuestionPostRequest $request) {
        $question = Question::create([
            'text' => $request->text,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to
        ]);

        return response()->json(['id' => $question->id], 201);
    }
}
