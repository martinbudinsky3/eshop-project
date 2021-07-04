<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Question;
use Illuminate\Database\Eloquent\Builder;
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
            ->whereDoesntHave('answers.votings', function(Builder $query) {
                $query->where('user_id', Auth::id());
            })
            ->has('answers', '>=', $this->MIN_SURVEY_ANSWER_COUNT)
            ->first();

        return view('index')
            ->with('news', $news)
            ->with('bests', $bests)
            ->with('survey', $question);
    }
}
