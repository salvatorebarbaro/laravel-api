@extends('layouts/app')

@section('content')
<div class="container py-5 ">
    <h1 class="mb-3">Projects List</h1>
    
    <table class="table mb-5 ">
        <thead>
            <tr>
                <th scope="col" class="pb-4">Title</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                
                <td>{{$project->title}}</td>
                <td>
                    <a href="{{$project->url}}">View the project on git-hub</a>
                </td>
                <td>
                    <a href="{{route('admin.projects.show', $project )}}">View more details</a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <a href="{{route('admin.projects.create')}}">create a new project</a>
    </div>
</div>
@endsection