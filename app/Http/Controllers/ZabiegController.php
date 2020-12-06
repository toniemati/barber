<?php

namespace App\Http\Controllers;

use App\Models\Zabieg;
use Illuminate\Http\Request;

class ZabiegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Zabieg::all();
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
        Zabieg::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zab = Zabieg::findOrFail($id);

        return $zab;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zabieg  $zabieg
     * @return \Illuminate\Http\Response
     */
    public function edit(Zabieg $zabieg)
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
        $zab = Zabieg::findOrFail($id);

        $zab->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zab = Zabieg::findOrFail($id);

        $zab->delete();
    }
}
