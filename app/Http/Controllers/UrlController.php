<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUrlRequest;
use App\Http\Requests\UpdateUrlRequest;
use App\Models\Url;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return view('Admin.allUrls');
        } else {
        }
    }
    public function MyUrls()
    {
        if (Auth::guard('admin')->check()) {
            return view('Admin.myUrls');
        } else {
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('admin')->check()) {
            return view('Admin.createUrl');
        } else {
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUrlRequest $request)
    {
        $validated = $request->validated();
        $url = new Url();

        $url->origin_url = $request->url;
        $url->admin_id = Auth::id();
        $url->is_active = true;
        $url->shortened_url_code = base_convert(mt_rand(0, PHP_INT_MAX), 10, 36);

        $url->save();


        Session::flash('success', 'Url Created Successfully.');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Url $url)
    {
        $url->is_active = !$url->is_active;
        $url->save();
        Session::flash('success', 'Url status updated successfully.');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        $url->delete();

        Session::flash('success', 'Url Deleted Successfully.');

        return back();
    }
}
