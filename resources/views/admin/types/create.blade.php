@extends('layouts/app')

@section('content')

<div class="container py-5">
    
    <h1 class="mb-5">Create</h1>

    <form action="{{route('admin.types.store')}}" method="POST">
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
            <label for="description" class="form-label">Description :</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
        </div>


        <div class="col-12 d-flex justify-content-between ">
          <button type="submit" class="btn btn-primary">Add a new type</button>
          <a href="{{route('admin.types.index')}}">Back to the list</a>
        </div>
    </form>

@endsection