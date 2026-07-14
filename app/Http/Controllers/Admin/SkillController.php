<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('sort_order')->get();
        return view('portfolio.admin.projects.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('portfolio.admin.projects.skills.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:100',
            'icon'       => 'nullable|string|max:100',
            'category'   => 'required|string',
            'level'      => 'required|integer|min:0|max:100',
            'sort_order' => 'nullable|integer',
        ]);
        Skill::create($validated);
        return redirect()->route('admin.skills.index')->with('success', 'Skill added!');
    }

    public function edit(Skill $skill)
    {
        return view('portfolio.admin.projects.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:100',
            'icon'       => 'nullable|string|max:100',
            'category'   => 'required|string',
            'level'      => 'required|integer|min:0|max:100',
            'sort_order' => 'nullable|integer',
        ]);
        $skill->update($validated);
        return redirect()->route('admin.skills.index')->with('success', 'Skill updated!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return back()->with('success', 'Skill deleted.');
    }
}