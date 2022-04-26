<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index' , compact('projects'));
    }

    public function store()
    {
        $validated =  request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $validated['owner_id'] = auth()->id();

        Project::create($validated);

        return redirect('projects');
    }

    public function show(Project $project)
    {
        return view('projects.show' , compact('project'));
    }
}
