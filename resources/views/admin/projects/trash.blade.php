@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<header class="d-flex justify-content-between align-items-center">
    <h1>Projects Eliminati</h1>

    <a href="{{route('admin.projects.index')}}">Ritorna post</a>

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

              <a href="{{route('admin.projects.trash')}}" class="btn btn-danger"><i class="fas fa-trash me-2"></i>Svuota Cestino</a>
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
                <form action="{{route('admin.projects.restore', $project->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success btn-sm "><i class="fas fa-arrows-rotate"></i></button>
                </form>
                <form action="{{route('admin.projects.drop', $project->id)}}" method="POST" class="delete-form" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm "><i class="fas fa-trash-can "></i></button>
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
    
@endsection

@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection