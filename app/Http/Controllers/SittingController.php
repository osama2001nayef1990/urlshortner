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
        return view('admin.sittings');
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
        $input = $request->rules();

        $inputs = $request->all();
        $sitting->fill([
            'name' => $inputs['name'],
            'about_us' => $inputs['about_us']
        ]);

        if ($request->hasFile('dark_logo')) {
            $file = $request->file('dark_logo');
            $destinationPath = 'public/sittings/';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
            $sitting->dark_logo = $originalFile;
        }
        if ($request->hasFile('light_logo')) {
            $file = $request->file('light_logo');
            $destinationPath = 'public/sittings/';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
            $sitting->light_logo = $originalFile;
        }
        if ($request->hasFile('light_favicon')) {
            $file = $request->file('light_favicon');
            $destinationPath = 'public/sittings/';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
            $sitting->light_favicon = $originalFile;
        }
        if ($request->hasFile('dark_favicon')) {
            $file = $request->file('dark_favicon');
            $destinationPath = 'public/sittings/';
            $originalFile = $file->getClientOriginalName();
            
            $file->move($destinationPath, $originalFile);
            $sitting->dark_favicon = $originalFile;
        }

        $sitting->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sitting $sitting)
    {
        //
    }
}
