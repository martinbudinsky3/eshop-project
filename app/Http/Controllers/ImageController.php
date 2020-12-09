<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;


class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::debug($request);

        /*foreach($request->file('files') as $uploadedFile){

            $filename = time() . '_' . $uploadedFile->getClientOriginalName();
      
            $path = $uploadedFile->store($filename, 'uploads');
        }*/
        //$product = Product::create(['name' => $request->name, 'description' => $request->description]);

        //return response()->json(['id' => $product->id]);
    }
}
