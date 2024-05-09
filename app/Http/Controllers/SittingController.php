<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSittingRequest;
use App\Http\Requests\UpdateSittingRequest;
use App\Models\Sitting;

class SittingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSittingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sitting $sitting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sitting $sitting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSittingRequest $request, Sitting $sitting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sitting $sitting)
    {
        //
    }
}
