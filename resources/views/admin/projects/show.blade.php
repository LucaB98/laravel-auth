@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<header>
    <h1 class="my-5">{{$project->title}}</h1>
</header>
<hr>
<div class="clearfix">
    @if ($project->image) 
    <img src="{{$project->image}}" alt="{{$project->title}}" class="me-2 float-start">
    @endif
    <p>{{$project->content}}</p>
    <div>
        <strong>Creato il:</strong> {{$project->created_at}}
        <strong>Ultima modifica:</strong> {{$project->updated_at}}
    </div>
</div>
    <hr>
<footer class="d-flex justify-content-between align-items-center">
    <a href="{{route('admin.projects.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Torna indietro</a>
    <div class="d-flex justify-content-between gap-2">
        <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning"> <i class="fas fa-pencil me-2"></i>Modifica</a>
        <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" class="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-can me-2"></i>Elimina</button>
        </form>
    </div>
</footer>
@endsection

@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection