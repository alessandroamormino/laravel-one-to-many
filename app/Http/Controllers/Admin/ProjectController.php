<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // richiamo la funzione per validare i dati prima di inviarli al db
        $this->validation($request);

        $formData = $request->all();

        $newProject = new Project();
        $newProject->title = $formData['title'];
        $newProject->content = $formData['content'];
        $newProject->slug = Str::slug($formData['title'], '-');
        $newProject->thumb = $formData['thumb'];
        $newProject->languages = $formData['languages'];
        $newProject->type_id = $formData['type_id'];
        $newProject->repo = $formData['repo'];

        $newProject->save();

        return redirect()->route('admin.projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //richiamo la funzione per validare i dati e invirli al db
        $this->validation($request);
        // memorizzo i dati del form
        $formData = $request->all();
        // aggiorno i dati 
        $formData['slug'] = Str::slug($formData['title'], '-');
        $project->update($formData);
        // salvo il record
        $project->save();

        // faccio il redirect alla show relativa al progetto modificato
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //cancello il progetto
        $project->delete();

        //faccil il redirect alla pagina con tutti i progetti 
        return redirect()->route('admin.projects.index');
    }

    // creo una funzione che mi gestisca gli errori nei form
    private function validation($request){
        // richiamo i dati
        $formData = $request->all();

        // richiamo il Validator
        $validator = Validator::make($formData, [
            // inserisco le mie regole
            'title' => 'required|max:255|min:5',
            'content' => 'required|min:10',
            'thumb' => 'required',    
            'languages' => 'required|min:2',
            'repo' => 'required',
        ], [
            // inserisco i messaggi personalizzati per ogni tipologia di errore per ogni campo
            'title.required' => "E' necessario inserire il titolo",
            'title.max' => "Il titolo non dev'essere superiore a :max caratteri",
            'title.min' => "Il titolo dev'essere di almeno :min caratteri",
            'content.required' => "E' necessario inserire la descrizione",
            'content.min' => "La descrizione dev'essere di almeno :min caratteri",
            'thumb.required' => "E' necessario inserire un'immagine di copertina",
            'languages.required' => "E' necessario inserire almeno un linguaggio utilizzato",
            'languages.min' => "Devi inserire almeno 2 caratteri",
            'repo.required' => "E' necessario inserire la repository",

        ])->validate();

        return $validator;
    }
}
