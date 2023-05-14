<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeaderRequest;
use App\Http\Requests\HeaderUpdateRequest;
use App\Models\Header;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $header = Header::get();
        return view('header.index', compact('header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('header.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HeaderRequest $request)
    {
        $data =  $request->validated();
        if ($request->hasFile('image')) {
            $filePath = Storage::disk('public')->put('images', request()->file('image'));
            $data['image'] = $filePath;
        };
        $create =  Header::create($data);
        if ($create) {
            session()->flash('notif.success', 'Post created successfully!');
            return redirect()->route('header.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Header $header)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Header $header)
    {
        return view('header.edit', compact('header'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HeaderUpdateRequest $request, Header $header)
    {
        $data =  $request->validated();
        if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($header->image);

            $filePath = Storage::disk('public')->put('images', request()->file('image'), 'public');
            $validated['image'] = $filePath;
        }

        $update = $header->update($data);

        if ($update) {
            session()->flash('notif.success', 'header updated successfully!');
            return redirect()->route('header.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Header $header)
    {
        Storage::disk('public')->delete($header->image);

        $header->delete();
        return redirect()->route('header.index');
    }
}
