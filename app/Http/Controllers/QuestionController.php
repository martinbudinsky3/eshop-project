<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionPutRequest;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\QuestionPostRequest;

class QuestionController extends Controller
{
    public function index() {
        $recordsPerPage = request('recordsPerPage', 5);
        $page = request('page', 1);
        $sortBy = request('sortBy', 'date_from');
        $descendingFlag = request('descending', 'false');

        $orderType = $descendingFlag == 'true' ? 'desc' : 'asc';
        $offset = ($page - 1) * $recordsPerPage;

        $questions = Question::skip($offset)
            ->orderBy($sortBy, $orderType)
            ->take($recordsPerPage)
            ->get();

        $count = Question::count();

        return response()->json(['count' => $count, 'questions' => $questions], 200);
    }

    public function indexAnswers(Question $question) {
        $question->load('answers');

        return response()->json(['answers' => $question->answers], 200);
    }

    public function results(Question $question) {
        $answers = Answer::withCount('votings')
            ->where('question_id', $question->id)
            ->get();

        return response()->json(['answers' => $answers], 200);
    }

    public function show(Question $question) {
        return response()->json($question, 200);
    }

    public function edit(Question $question) {
        return response()->json($question, 200);
    }

    public function store(QuestionPostRequest $request) {
        $question = Question::create([
            'text' => $request->text,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to
        ]);

        return response()->json(['id' => $question->id], 201);
    }

    public function update(QuestionPutRequest $request, Question $question) {
        $question->text = $request->text;
        $question->date_from = $request->date_from;
        $question->date_to = $request->date_to;

        $question->save();

        return response()->json(null, 204);
    }

    public function destroy(Question $question) {
        $question->delete();

        return response()->json(null, 204);
    }
}
