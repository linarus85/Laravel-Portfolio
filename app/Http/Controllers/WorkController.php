<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequest;
use App\Http\Requests\WorkUpdateRequest;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $work = Work::get();
        return view('work.index', compact('work'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('work.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkRequest $request)
    {
        $data =  $request->validated();
        if ($request->hasFile('image')) {
            $filePath = Storage::disk('public')->put('images', request()->file('image'));
            $data['image'] = $filePath;
        };
        $create =  work::create($data);
        if ($create) {
            session()->flash('notif.success', 'Post created successfully!');
            return redirect()->route('work.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $work)
    {
        return view('work.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkUpdateRequest $request, Work $work)
    {
        $data =  $request->validated();
        if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($work->image);

            $filePath = Storage::disk('public')->put('images', request()->file('image'), 'public');
            $validated['image'] = $filePath;
        }

        $update = $work->update($data);

        if ($update) {
            session()->flash('notif.success', 'work updated successfully!');
            return redirect()->route('work.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work)
    {
        Storage::disk('public')->delete($work->image);

        $work->delete();
        return redirect()->route('work.index');
    }
}
