<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'long_description' => 'nullable|string',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'github_url'       => 'nullable|url',
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
        $validated['slug'] = Str::slug($validated['title']);

        Project::create($validated);
        return redirect()->route('admin.projects.index')->with('success', 'Project created!');
    }

    public function edit(Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'long_description' => 'nullable|string',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'github_url'       => 'nullable|url',
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
        $validated['slug'] = Str::slug($validated['title']);

        $project->update($validated);
        return redirect()->route('admin.projects.index')->with('success', 'Project updated!');
    }

    public function destroy(Project $project)
    {
        if ($project->image) Storage::disk('public')->delete($project->image);
        Project::destroy($project->id);
        return back()->with('success', 'Project deleted.');
    }
}