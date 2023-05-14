<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Http\Requests\AboutUpdateRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::get();
        return view('about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request)
    {
        $data =  $request->validated();
        if ($request->hasFile('image')) {
            $filePath = Storage::disk('public')->put('images', request()->file('image'));
            $data['image'] = $filePath;
        };
        $create =  about::create($data);
        if ($create) {
            session()->flash('notif.success', 'Post created successfully!');
            return redirect()->route('about.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutUpdateRequest $request, About $about)
    {
        $data =  $request->validated();
        if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($about->image);

            $filePath = Storage::disk('public')->put('images', request()->file('image'), 'public');
            $validated['image'] = $filePath;
        }

        $update = $about->update($data);

        if ($update) {
            session()->flash('notif.success', 'about updated successfully!');
            return redirect()->route('about.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        Storage::disk('public')->delete($about->image);

        $about->delete();
        return redirect()->route('about.index');
    }
}
