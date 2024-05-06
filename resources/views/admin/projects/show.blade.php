@extends('layouts/app')

@section('content')

<div class="container py-5">
    
    <h1 class="mb-5">Details</h1>

    <div class="mb-5">

        <div class="text-center">
            <img src="{{asset('storage/' . $project->thumb)}}" class="card-img-top mb-4" style="width: 18rem;" alt="Project Thumb">
        </div>
        <div class="text-center mb-3">
            <h1>{{$project->title}}</h1>
            <small>{{$project->type?->name}}</small>    
        </div>
        <div class="d-flex gap-3 mb-5">
            @foreach ($project->technologies as $technology)
            <span class="badge rounded-pill px-3 py-2 text-dark " style="background-color: {{$technology->color ?? 'rgba(255,255,255, 1)'}}">
                {{$technology->name}}
            </span>
            @endforeach
        </div>
        
        <div>{{$project->description}}</div>
        <div>{{$project->url}}</div>
    </div>
    
    <div class="flex justify-content-between ">

        <div class="d-flex gap-4 mb-4">
            <a href="{{route('admin.projects.edit', $project )}}">
                Edit your project
            </a>
            <a href="{{route('admin.projects.index')}}">
                Back to the list
            </a>
        </div>

        {{-- destroy btn --}}
        <div>
            {{-- button for destroy --}}
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#destroyModal">
                Delete Item
            </button>
        </div>


        {{-- Modal for destroy --}}
    <div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content">
  
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Item</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
  
            <div class="modal-body">
              Are you sure that you want to delete this project: 
                <br>

              "{{$project->title}}" ?
            </div>
  
  
            <div class="modal-footer d-flex gap-3 ">
  
                <button type="button" class="btn btn-success " data-bs-dismiss="modal">Back</button>
                
                
                <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    
                    <button class="btn btn-danger">Go ahed</button>
                </form>
  
            </div>
  
          </div>
        </div>
    </div>
</div>

@endsection