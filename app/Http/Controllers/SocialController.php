<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialRequest;
use App\Http\Requests\SocialUpdateRequest;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $social = Social::all();
        return view('social.index', compact('social'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocialRequest $request)
    {
        $data =  $request->validated();
        social::create($data);
        return redirect()->route('social.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Social $social)
    {
        return view('social.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialUpdateRequest $request, Social $social)
    {
        $validated = $request->validated();

        $social->update($validated);

        return redirect(route('social.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Social $social)
    {
        $social->delete();
        return redirect()->route('social.index');
    }
}
