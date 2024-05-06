@extends('layouts/app')

@section('content')

<div class="container py-5">
    
    <h1 class="mb-5">Create</h1>

    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title :</label>
            <input type="text" required class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
              @error('title')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
        </div>   

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label">Thumb image :</label>
            <input type="file" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb">
                @error('thumb')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Link to the project :</label>
            <input type="text" required class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{old('url')}}">
                @error('url')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
        </div>

        <div class="row mb-5 ">
            {{-- type --}}
            <div class="col-3">
                <label for="type_id" class="form-label">Select a Type for your project :</label>
                <select class="form-select" name="type_id" id="type_id">
                    
                    <option value=""></option>

                    @foreach ($types as $type)
                    <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : '' }}>{{$type->name}}</option>                       
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

                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                        >
                        <label for="technology-{{$technology->id}}" class="form-check-label" >
                            {{$technology->name}}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        


        <div class="col-12 d-flex justify-content-between ">
          <button type="submit" class="btn btn-primary">Add a new project</button>
          <a href="{{route('admin.projects.index')}}">Back to the list</a>
        </div>
    </form>

@endsection