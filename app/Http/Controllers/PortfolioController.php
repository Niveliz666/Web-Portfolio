<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Contact;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->get();
        $skills = Skill::orderBy('sort_order', 'asc')->get()->groupBy('category');
        $projectCount = Project::count();
        $clientCount = Contact::distinct('email')->count();
        return view('portfolio.index', compact('projects', 'skills', 'projectCount', 'clientCount'));
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        Contact::create($validated);

        return back()->with('success', 'Message sent! I will get back to you soon.');
    }
}