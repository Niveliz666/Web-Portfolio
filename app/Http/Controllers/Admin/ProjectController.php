<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(10);
        return view('portfolio.admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('portfolio.admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'long_description' => 'nullable|string',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'live_url'         => 'nullable|url',
            'category'         => 'required|string',
            'technologies'     => 'nullable|string',
            'featured'         => 'nullable|boolean',
            'sort_order'       => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $validated['technologies'] = $request->technologies
            ? array_map('trim', explode(',', $request->technologies)) : [];
        $validated['featured'] = $request->has('featured');

        Project::create($validated);
        return redirect()->route('admin.projects.index')->with('success', 'Project created!');
    }

    public function edit(Project $project)
    {
        return view('portfolio.admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'long_description' => 'nullable|string',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'live_url'         => 'nullable|url',
            'category'         => 'required|string',
            'technologies'     => 'nullable|string',
            'featured'         => 'nullable|boolean',
            'sort_order'       => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) Storage::disk('public')->delete($project->image);
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $validated['technologies'] = $request->technologies
            ? array_map('trim', explode(',', $request->technologies)) : [];
        $validated['featured'] = $request->has('featured');

        $project->update($validated);
        return redirect()->route('admin.projects.index')->with('success', 'Project updated!');
    }

    public function destroy(Project $project)
    {
        if ($project->image) Storage::disk('public')->delete($project->image);
        $project->delete();
        return back()->with('success', 'Project deleted.');
    }
}