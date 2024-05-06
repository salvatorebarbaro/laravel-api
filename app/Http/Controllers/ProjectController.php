<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;

use App\Http\Requests\StoreProjectRequest;
use Illuminate\Support\Facades\Storage;

//ci importiamo la libreria per la gestione e la creazione delle stringhe utile per gli slug
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //validation
        $request->validated();
        $newProject = new Project();

        //check for image file
        if ($request->hasFile('thumb')) {
            $thumb_path = Storage::disk('public')->put('projects_thumbs', $request->thumb);
            $newProject->thumb = $thumb_path;
        }
        
        //comando usato per "scrivere in modo corretto" la stringa da inserire nel url
        $newProject->slug = Str::slug($request->title);

        //fillable
        $newProject->fill($request->all());

        


        $newProject->save();

        // technologies 
        $newProject->technologies()->attach($request->technologies);

        // redirect to the list
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        


        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        //validation
        $request->validated();

        //check for image file
        if ($request->hasFile('thumb')) {
            $thumb_path = Storage::disk('public')->put('projects_thumbs', $request->thumb);
            $project->thumb = $thumb_path;
        }
        
        //comando usato per "scrivere in modo corretto" la stringa da inserire nel url
        $project->slug = Str::slug($request->title);

        //fillable
        $project->update($request->all()); 

        

        $project->save();
       
        // technologies
        $project->technologies()->sync($request->technologies);
       
        return redirect()->route('admin.projects.show', $project);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
