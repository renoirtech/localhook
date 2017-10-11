<?php

namespace App\Http\Controllers;

use App\Environment;
use Illuminate\Http\Request;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class EnvironmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $environments = Environment::paginate(50);
        return view('environments.index')->with(compact('environments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $environment = new Environment;
        return view('environments.create')->with(compact('environment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url'  => 'required|url',
        ]);

        $uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, $request->name . $request->url . \Carbon\Carbon::now()->format('U'));

        $environment = Environment::create([
            'uuid'    => $uuid,
            'name'    => $request->name,
            'url'     => $request->url,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('environments.show', ['uuid' => $environment->uuid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $environment = \App\Environment::where('uuid', $uuid)->first();
        return view('environments.show')->with(compact('environment'));
    }

    /**
     * Display the specified resource on API.
     *
     * @param  string $uuid
     * @return \Illuminate\Http\Response
     */
    public function showAPI($uuid){
        $environment = \App\Environment::where('uuid', $uuid)->first();
        return $environment->only(['url']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit(Environment $environment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Environment  $environment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Environment $environment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Environment $environment)
    {
        //
    }
}
