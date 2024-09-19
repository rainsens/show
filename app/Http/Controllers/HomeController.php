<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('created_at')->limit(9)->get();
        $inquiries = Inquiry::orderByDesc('id')->limit(5)->get();
        return view('home', compact('projects', 'inquiries'));
    }
}
