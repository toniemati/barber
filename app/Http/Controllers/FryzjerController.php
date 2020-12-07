<?php

namespace App\Http\Controllers;

use App\Models\Fryzjer;
use Illuminate\Http\Request;

class FryzjerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Fryzjer::all();
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
        Fryzjer::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fryz = Fryzjer::findOrFail($id);

        return $fryz;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fryzjer  $fryzjer
     * @return \Illuminate\Http\Response
     */
    public function edit(Fryzjer $fryzjer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fryz = Fryzjer::findOrFail($id);

        $fryz->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fryz = Fryzjer::findOrFail($id);

        $fryz->delete();
    }
}
