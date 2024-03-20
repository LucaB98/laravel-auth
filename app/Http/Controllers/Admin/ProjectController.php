<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');

        $query = Project::orderByDesc('updated_at')->orderByDesc('created_at');

        if($filter){
            $value = $filter === 'published';
            $query->whereIsPublished($value);
        }

        $projects = $query->paginate(10)->withQueryString();
        return view('admin.projects.index', compact('projects', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:5|max:50|unique:project',
            'content' => 'required|string',
            'image' => 'nullable|url',
            'is_published' => 'nullable|boolean',
        ],
        [
            'title.required' => 'il titolo è obbligatorio',
            'title.min' => 'il titolo deve essere almeno di :min caratteri',
            'title.max' => 'il titolo deve essere massimo di :max caratteri',
            'title.unique' => 'il titolo esiste già',
            'content.required' => 'il contenuto è obbligatorio',
            'image.url' => 'url inserito non è corretto',
            'is_published.boolean' => 'il valore del campo pubblicazione non è valido',

        ]);
         $data = $request->all();
         $project = new Project();
         $project->fill($data);
         $project->slug = Str::slug($project->title);
         $project->is_published = Arr::exists($data, 'is_published');

         $project->save();
         return to_route('admin.projects.show', $project)->with('message', 'Progetto creato con successo')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => ['required','string','min:5','max:50',Rule::unique('projects')->ignore($project->id)],
            'content' => 'required|string',
            'image' => 'nullable|url',
            'is_published' => 'nullable|boolean',
        ],
        [
            'title.required' => 'il titolo è obbligatorio',
            'title.min' => 'il titolo deve essere almeno di :min caratteri',
            'title.max' => 'il titolo deve essere massimo di :max caratteri',
            'title.unique' => 'il titolo esiste già',
            'content.required' => 'il contenuto è obbligatorio',
            'image.url' => 'url inserito non è corretto',
            'is_published.boolean' => 'il valore del campo pubblicazione non è valido',

        ]);
        $data = $request->all();
        
        $data['slug'] = Str::slug($data['title']);
        $data['is_published'] = Arr::exists($data, 'is_published');
        $project->update($data);

        return to_route('admin.projects.show', $project)->with('message', 'Progetto modificato con successo')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')->with('type', 'success')->with('message', 'Project eliminato con successo');
    }
}
