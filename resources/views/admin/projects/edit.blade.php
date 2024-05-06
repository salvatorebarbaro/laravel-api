@extends('layouts/app')

@section('content')

<div class="container py-5">
    
    <h1 class="mb-5">Edit</h1>

    <form action="{{route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title :</label>
            <input type="text" required class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title') ?? $project->title}}">
              @error('title')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description') ?? $project->description}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
        </div>

        <div class="mb-3">
            <div>
                <img src="{{asset('storage/' . $project->thumb)}}" class="card-img-top mb-2" style="width: 18rem;" alt="Project Thumb">
            </div>
            <label for="thumb" class="form-label">Thumb : </label>
            <input type="file" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb">
                @error('thumb')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Link to the project :</label>
            <input type="text" required class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{old('url') ?? $project->url}}">
                @error('url')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
        </div>

        <div class="row">
            
            {{-- type --}}
            <div class="mb-3 col-3">
                <div class="form-label">Select a Type for your project :</div>
                <select class="form-select" name="type_id" id="type_id">

                    <option value=""></option>

                    @foreach ($types as $type)
                    <option value="{{$type->id}}" {{$type->id == old('type_id', $project->type ? $project->type->id : '') ? 'selected' : '' }}>{{$type->name}}</option>                       
                    @endforeach
                </select>
            </div>

            {{-- technologies --}}
            <div class="col-9 ">
                <label for="" class="form-label">Select the technologies used for your project :</label>
                <div class="d-flex gap-4">
                    @foreach ($technologies as $technology)                 
                    <div class="form-check">                    
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name="technologies[]"
                            value="{{$technology->id}}"
                            id="technology-{{$technology->id}}"

                            @if ($errors->any())
                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                            @else
                            {{ $project->technologies->contains($technology) ? 'checked' : '' }}
                            @endif
                        >
                        <label for="technology-{{$technology}}" class="form-check-label" >
                            {{$technology->name}}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
        


        <div class="col-12 d-flex justify-content-between ">
          <button type="submit" class="btn btn-primary">Save changes</button>

          <a href="{{route('admin.projects.show', $project)}}">Cancel changes</a>
        </div>
    </form>

@endsection