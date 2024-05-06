@extends('layouts/app')

@section('content')

<div class="container py-5">
    
    <h1 class="mb-5">Details</h1>

    <div class="mb-5">
        <h1 class="text-center mb-4">{{$type->name}}</h1>
    </div>
    <div>
        <p>{{$type?->description}}</p>
    </div>
    
    <div class="flex justify-content-between ">

        <div class="d-flex gap-4 mb-4">
            <a href="{{route('admin.types.edit', $type->id)}}">
                Edit your type
            </a>
            <a href="{{route('admin.types.index')}}">
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
              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Type</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
  
            <div class="modal-body">
              Are you sure that you want to delete this type: 
                <br>

              "{{$type->name}}" ?
            </div>
  
  
            <div class="modal-footer d-flex gap-3 ">
  
                <button type="button" class="btn btn-success " data-bs-dismiss="modal">Back</button>
                
                
                <form action="{{route('admin.types.destroy', $type->id)}}" method="POST">
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