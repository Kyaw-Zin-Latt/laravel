<?php

namespace App\Http\Controllers;

use App\Quality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QualityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("quality.index");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => "required|unique:qualities,title",
        ]);
        $quality = new Quality();
        $quality->title = $request->title;
        $quality->user_id = Auth::id();
        $quality->save();

        return redirect()->route("quality.index")->with("toast","New Quality added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function show(Quality $quality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function edit(Quality $quality)
    {
        return view('quality.edit',compact('quality'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quality $quality)
    {
        $request->validate([
            'title' => "required|qualities,title,".$quality->id,
        ]);
        $quality->title = $request->title;
        $quality->update();
        return redirect()->route("quality.index")->with("toast","Quality Update successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quality $quality)
    {
        //
    }
}
