<?php

namespace App\Http\Controllers;

use App\Bin;
use Illuminate\Http\Request;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class BinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bins = Bin::paginate(50);
        return view('bins.index')->with(compact('bins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bin = new Bin;
        return view('bins.create')->with(compact('bin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, $user->email . \Carbon\Carbon::now()->format('U'));
        $bin = Bin::create([
            'uuid'    => $uuid,
            'user_id' => $user->id
         ]);
         return redirect()->route('bins.show', ['uuid' => $bin->uuid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bin  $bin
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $bin = Bin::where('uuid', $uuid)->first();
        return view('bins.show')->with(compact('bin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bin  $bin
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bin  $bin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bin  $bin
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        //
    }
}
