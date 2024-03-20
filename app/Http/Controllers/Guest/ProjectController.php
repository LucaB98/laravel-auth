<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
   

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('guest.show', compact('project'));
    }

    
}
