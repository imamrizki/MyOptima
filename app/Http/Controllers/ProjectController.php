<?php

namespace App\Http\Controllers;

use App\Models\Sto;
use App\Models\Permintaan;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function inputProject()
    {
        $permintaan = Permintaan::get();
        $sto = Sto::get();

        // dd($project);
        
        return view('project.form_project', compact('permintaan', 'sto'));
    }

}
