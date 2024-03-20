
@if ($project->exists)
    <form action="{{route('admin.projects.update', $project->id)}}" method="POST" novalidate>
    @method('PUT')

@else
    <form action="{{route('admin.projects.store')}}" method="POST" novalidate>

@endif


    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @elseif(old('title', '')) is-valid @enderror" id="title" name="title" placeholder="Titolo.." value="{{old('title', $project->title)}}" required>
                @error('title')
                <div class="invalid-feedback">{{$message}}</div>
                @else
                 <div class="form-text">Inserisci il titolo del post</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control " id="slug" value="{{Str::slug(old('slug', $project->title))}}" disabled>
                @error('title')
                <div class="invalid-feedback">{{$message}}</div>
                @else
                 <div class="form-text">Inserisci il titolo del post</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control @error('content') is-invalid @elseif(old('content', '')) is-valid @enderror" name="content" id="content" rows="10" required>{{old('content', $project->content)}}</textarea>
                @error('content')
                <div class="invalid-feedback">{{$message}}</div>
                @else
                 <div class="form-text">Inserisci il contenuto del post</div>
                @enderror
            </div>
        </div>
        <div class="col-11">
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="url" class="form-control @error('image') is-invalid @elseif(old('image', '')) is-valid @enderror" id="image" name="image" placeholder="http:..." value="{{old('image', $project->image)}}">
                @error('image')
                <div class="invalid-feedback">{{$message}}</div>
                @else
                 <div class="form-text">Inserisci un'indirizzo valido</div>
                @enderror
            </div>
        </div>
        <div class="col-1">
            <div class="mb-3">
                <img src="{{ old( 'image', $project->image ?? 'https://marcolanci.it/boolean/assets/placeholder.png')}}" class="img-fluid" alt="img" id="preview">
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <div class="form-check">
                <input class="form-check-input @error('is_published') is-invalid @elseif(old('is_published', '')) is-valid @enderror" type="checkbox" value="1" id="is_published" name="is_published" @if(old('is_published', $project->is_published)) checked @endif>
                <label class="form-check-label" for="is_published">
                  Pubblicato
                </label>
            </div>
        </div>
    </div>
      
      <hr>
      <div class="d-flex align-items-center justify-content-between">
        <a href="{{route('admin.projects.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Torna indietro</a>
        <div class="d-flex align-items-center gap-2">
            <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Svuota i campi</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-floppy-disk me-2"></i> Salva</button>
        </div>
      </div>
  </form>




