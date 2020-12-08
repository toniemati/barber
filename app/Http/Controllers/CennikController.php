<?php

namespace App\Http\Controllers;

use App\Models\Cennik;
use Illuminate\Http\Request;

class CennikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cenniki = Cennik::all();

        foreach ($cenniki as $cennik) {
            $fry = $cennik->fryzjer;
            $zab = $cennik->zabieg;
        }

        return $cenniki;
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
        Cennik::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cennik = Cennik::findOrFail($id);
        $fryz = $cennik->fryzjer;
        $zab = $cennik->zabieg;

        return $cennik;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cennik  $cennik
     * @return \Illuminate\Http\Response
     */
    public function edit(Cennik $cennik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cennik  $cennik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cennik $cennik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cennik  $cennik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cennik $cennik)
    {
        //
    }
}
