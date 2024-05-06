@extends('layouts/app')

@section('content')
<div class="container py-5 ">
    <h1 class="mb-3">Types List</h1>
    
    <table class="table mb-5 ">
        <thead>
            <tr>
                <th scope="col" class="pb-4">Name</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
            <tr>
                
                <td>{{$type->name}}</td>
                <td>
                    <a href="{{route('admin.types.show', $type->id )}}">View more details</a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <a href="{{route('admin.types.create')}}">create a new type</a>
    </div>
</div>
@endsection