<?php

namespace App\Http\Controllers;

use App\Models\Maker;
use Illuminate\Http\Request;
use Validator;

class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $makers =  $request -> sort ? Maker::orderBy ('name')->get() : Maker::all();

        // $makers = Maker::all();
        // $makers = Maker::orderBY('name')->get(); // rusiavimas pagal name

        return view('maker.index', ['makers' => $makers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
        [
            'maker_name' => ['required', 'min:3', 'max:64'],
        ],
        // [
        //     'author_name.min' => 'Please type a normal name...',
        // ]
    
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 
        $maker = new Maker;
        $maker->name = $request->maker_name;
        $maker->save();
        return redirect()->route('maker.index')->with('success_message', 'Maker was created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maker  $maker
     * @return \Illuminate\Http\Response
     */
    public function show(Maker $maker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maker  $maker
     * @return \Illuminate\Http\Response
     */
    public function edit(Maker $maker)
    {
        return view('maker.edit', ['maker' => $maker]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maker  $maker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maker $maker)
    {
        $validator = Validator::make($request->all(),
        [
            'maker_name' => ['required', 'min:3', 'max:64'],
        ],
        // [
        //     'author_name.min' => 'Please type a NORMAL name...'
        // ]
            
    
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        $maker->name = $request->maker_name;
        $maker->save();
        return redirect()->route('maker.index')->with('success_message', 'Maker was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maker  $maker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maker $maker)
    {
        if($maker->makerCars->count()){
            // return 'Trinti negalima, nes yra priskirtu automobiliu';
            return redirect()->back()->with('info_message', 'There are some assigned cars. The Maker can not be deleted!');
        }
        $maker->delete();
        return redirect()->route('maker.index')->with('info_message', 'Maker was deleted!');


    }







    
}
