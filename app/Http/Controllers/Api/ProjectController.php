<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with(['type', 'technologies'])->get();

        return response()->json([
            "success" => true,
            "results" => $projects,
        ]);
    }



    public function show($slug) {

        // per trovare il post senza eager loading
        // $post = Post::find($id);

        $project = Project::with(['type', 'technologies'])->where('slug', '=', $slug)->first();

        // dd($post);

        return response()->json([
            "success" => true,
            "project" => $project
        ]);

    }





}
