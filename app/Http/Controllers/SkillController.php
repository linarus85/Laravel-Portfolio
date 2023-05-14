<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Http\Requests\SkillUpdateRequest;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skill = Skill::all();
        $content = DB::table('skills')->find(7);
        return view('skill.index', compact('content', 'skill'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillRequest $request)
    {
        $data =  $request->validated();
        $create =  Skill::create($data);
        if ($create) {
            session()->flash('notif.success', 'Post created successfully!');
            return redirect()->route('skill.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('skill.skill-edit-form', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillUpdateRequest $request, Skill $skill)
    {
        $data =  $request->validated();
        $update = $skill->update($data);

        if ($update) {
            session()->flash('notif.success', 'skill updated successfully!');
            return redirect()->route('skill.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skill.index');
    }
}
