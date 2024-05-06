@extends('layouts/app')

@section('content')

<div class="container py-5">
    
    <h1 class="mb-5">Create</h1>

    <form action="{{route('admin.technologies.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">name :</label>
            <input type="text" required class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
              @error('name')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
        </div>   

        <div class="mb-3">
            <label for="color" class="form-label">Color :</label>
            <input type="color" class="form-control form-control-color @error('color') is-invalid @enderror" id="color" value="{{old('color')}}" title="Choose your color" name='color'>
                @error('color')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
        </div>


        <div class="col-12 d-flex justify-content-between ">
          <button type="submit" class="btn btn-primary">Add a new Technology</button>
          
          <a href="{{route('admin.technologies.index')}}">Back to the list</a>
        </div>
    </form>

@endsection