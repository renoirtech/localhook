<?php

namespace App\Http\Controllers;

use App\BinRequest;
use Illuminate\Http\Request;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class BinRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function receive($uuid, Request $request)
    {
        $bin = \App\Bin::where('uuid', $uuid)->first();
        $uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, $bin->uuid . $request->method() . \Carbon\Carbon::now()->format('U'));
        $binRequest = \App\BinRequest::create([
            'uuid'         => $uuid,
            'name'         => $request->method(),
            'method'       => $request->method(),
            'content_type' => $request->header()['content-type'][0],
            'body'         => json_encode($request->all(), true),
            'bin_id'       => $bin->id
        ]);
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
    public function store(BinRequest $binRequest)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(BinRequest $binRequest)
    {
        //
    }

    /**
     * Display the specified resource on API.
     *
     * @param  string $uuid
     * @return \Illuminate\Http\Response
     */
    public function showAPI($uuid){
        $request = \App\BinRequest::where('uuid', $uuid)->first();
        return $request;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BinRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(BinRequest $binRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BinRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BinRequest $binRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BinRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(BinRequest $binRequest)
    {
        //
    }
}
