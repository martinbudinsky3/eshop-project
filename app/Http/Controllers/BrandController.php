<?php

namespace App\Http\Controllers;
use App\Models\Brand;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        return response()->json($brands);
    }
}
