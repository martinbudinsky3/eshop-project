<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;


class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();

        return response()->json($colors);
    }
}
