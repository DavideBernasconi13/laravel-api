<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::all();
        // dd($project);
        return response()->json([
            'success' => true,
            'result' => $project
        ]);
    }
}
