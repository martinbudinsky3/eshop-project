<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Delivery;


class DeliveryController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $delivery = Delivery::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' =>$request->email,
            'street' =>$request->street,
            'town' => $request->town,
            'country' => $request->country,
            'house_number' => $request->numb,
            'phone_number' => $request->phone,
            'zip' => $request->zip
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'numb' => 'required|string|max:15',
            'phone' => 'required|string|max:255',
            'zip' => 'required|string|max:15',
        ]);

        $delivery = Auth::user()->delivery;
        if(!$delivery) {
            $this->store($request);
        } else {
            $delivery->name = $request->name;
            $delivery->email = $request->email;
            $delivery->phone_number = $request->phone;
            $delivery->street = $request->street;
            $delivery->house_number = $request->numb;
            $delivery->town = $request->town;
            $delivery->zip = $request->zip;
            $delivery->country = $request->country;

            $delivery->save();
        }

        return redirect('/profile/info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $delivery = Auth::user()->delivery;
        if($delivery) {
            $delivery->delete();
        }

        return redirect('/profile/info');
    }
}
