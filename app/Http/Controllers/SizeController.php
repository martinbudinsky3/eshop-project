<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDesign;


class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizesRecords = ProductDesign::all()->unique('size');

        $sizes = array();
        foreach($sizesRecords as $sizeRecord) {
            array_push($sizes, $sizeRecord->size);
        }

        return response()->json($sizes);
    }
}
