<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Cities;
use Illuminate\Http\Request;
use Validator;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ads $ads)
    {
        /*$file = file('E:\Programavimas\wamp\www\eglutes\public\Miestai ir rajonai.txt');
        //dd($file[0]);
        foreach ($file as $title1) {
            $title= str_replace(PHP_EOL, '', $title1);
            $cities = Cities::where('title', $title)->first();
            if (is_null($cities)) {
                Cities::create([
                    'title' => $title,
                    'title2' => '',
                    'status' => 1
                ]);
            }

        }*/

        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cities $cities)
    {
        $cities = $cities->where('status', 1)
                         ->orderBy('title')
                         ->get();

        return view('ads.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ads $ads)
    {
        return response()->json($request->all());
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'text'      => 'required',
            'email'     => 'required|email',
            'city'      => 'required',
            'address'   => 'required',
            'phone'     => 'required',
            'price'     => 'required|numeric',
            'price_new' => 'numeric',
            'status'    => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ads $ads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ads)
    {
        //
    }
}
