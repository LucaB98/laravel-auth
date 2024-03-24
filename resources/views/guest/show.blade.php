@extends('layouts.app')

@section('title', 'project')
@section('content')



<hr>



<div class="card my-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        {{$project->title}}
    
    </div>
    <div class="card-body">
        <div class="row">
            @if($project->image)
            <div class="col-3">
                <img src="{{$project->printImage()}}" alt="{{$project->title}}">
            </div>
            @endif
            <div class="col">

                <h5 class="card-title mb-3">{{$project->title}}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{$project->created_at}}</h6>
                <p class="card-text">{{$project->content}}</p>
            </div>
        </div>
      
    </div>
  </div>

@endsection