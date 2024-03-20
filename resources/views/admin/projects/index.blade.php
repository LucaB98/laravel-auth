@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<header class="d-flex justify-content-between align-items-center">
    <h1>Projects</h1>

    <form action="{{route('admin.projects.index')}}" method="GET">
      <div class="input-group">
        <select class="form-select" id="filter" name="filter">
          <option value="">Tutti</option>
          <option value="published"  @if ($filter === 'published') selected @endif>Pubblicato</option>
          <option value="drafts" @if ($filter === 'drafts') selected @endif>Bozze</option>
        </select>
        <button class="btn btn-outline-secondary">Filtra</button>
      </div>
    </form>

</header>

<table class="table table-dark table-hover">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Titolo</th>
          <th scope="col">Slug</th>
          <th scope="col">Stato</th>
          <th scope="col">Creato il</th>
          <th scope="col">Ultima Modifica</th>
          <th>
            <div class="d-flex justify-content-end">

              <a href="{{route('admin.projects.create')}}" class="btn btn-success"><i class="fas fa-plus me-2"></i>Nuovo</a>
            </div>
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse ($projects as $project)
        <tr>
          <th scope="row">{{$project->id}}</th>
          <td>{{$project->title}}</td>
          <td>{{$project->slug}}</td>
          <td>{{$project->is_published ? 'Pubblicato' : 'Bozza'}}</td>
          <td>{{$project->getFormatedDate('created_at', 'd-m-y H:i:s')}}</td>
          <td>{{$project->getFormatedDate('updated_at')}}</td>
          <td>
            <div class="d-flex justify-content-end gap-2">
                <a href="{{route('admin.projects.show', $project)}}" class="btn btn-sm btn-primary">
                <i class="fas fa-eye"></i></a>
                <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning btn-sm"> <i class="fas fa-pencil"></i></a>
                <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-can"></i></button>
                </form>
            </div>
          </td>

        </tr>
            
        @empty
            <tr>
                <td colspan="7">
                    <h3 class="text-center">Non ci sono progetti</h3>
                </td>
            </tr>
        @endforelse
       
      </tbody>
</table>

@if($projects->hasPages())
    {{$projects->links()}}
@endif    
@endsection

@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection