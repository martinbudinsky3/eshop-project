<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    private $MIN_SURVEY_ANSWER_COUNT = 2;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Product::orderBy('created_at', 'desc')->take(12)->get();
        $bests = Product::inRandomOrder()->take(12)->get();

        $question = Question::where('date_from', '<=', now())
            ->where('date_to', '>=', now())
            ->has('answers', '>=', $this->MIN_SURVEY_ANSWER_COUNT)
            ->first();

        Log::debug($question);

        return view('index')
            ->with('news', $news)
            ->with('bests', $bests)
            ->with('survey', $question);
    }
}
