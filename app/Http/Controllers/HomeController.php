<?php

namespace App\Http\Controllers;

use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('created_at')->limit(9)->get();
        return view('home', compact('projects'));
    }
}
