@extends('layouts/app')

@section('content')
<div class="container py-5 ">
    <h1 class="mb-3">Technologies List</h1>
    
    <table class="table mb-5 ">
        <thead>
            <tr>
                <th scope="col" class="pb-4">Name</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
            <tr>
                
                <td>{{$technology->name}}</td>
                <td>
                    <a href="{{route('admin.technologies.show', $technology->id )}}">View more details</a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <a href="{{route('admin.technologies.create')}}">create a new technology</a>
    </div>
</div>
@endsection