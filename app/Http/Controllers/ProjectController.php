<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function inputProject()
    {
        // $project = Project::with(['tematik'])->get();
        // dd($project);
        
        return view('project.form_project');
    }
}
