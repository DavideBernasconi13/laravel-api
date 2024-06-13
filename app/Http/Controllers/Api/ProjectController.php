<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::paginate(3);
        // dd($project);
        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }

    public function show($slug)
    {
        //eager loading-> with (cosa mi interessa portare come dato relazionato)
        $project = Project::where('slug', $slug)->with('category', 'tags')->first();
        if ($project) {
            return response()->json([
                'success' => true,
                'result' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Project not found'
            ]);
        }

    }
}
