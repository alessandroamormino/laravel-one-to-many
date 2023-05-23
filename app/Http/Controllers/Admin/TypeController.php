<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
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

        $newType = new Type();
        $newType->name = $formData['name'];
        $newType->slug = Str::slug($formData['name'], '-');
        $newType->description = $formData['description'];

        $newType->save();

        return redirect()->route('admin.types.show', $newType);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
      return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
      //richiamo la funzione per validare i dati e invirli al db
      $this->validation($request);
      // memorizzo i dati del form
      $formData = $request->all();
      // aggiorno i dati 
      $formData['slug'] = Str::slug($formData['name'], '-');
      $type->update($formData);
      // salvo il record
      $type->save();

      // faccio il redirect alla show relativa al progetto modificato
      return redirect()->route('admin.types.show', $type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }

    // creo una funzione che mi gestisca gli errori nei form
    private function validation($request){
        // richiamo i dati
        $formData = $request->all();

        // richiamo il Validator
        $validator = Validator::make($formData, [
            // inserisco le mie regole
            'name' => 'required|max:255|min:5',
            'description' => 'required|min:10',
        ], [
            // inserisco i messaggi personalizzati per ogni tipologia di errore per ogni campo
            'name.required' => "E' necessario inserire il nome",
            'name.max' => "Il nome non dev'essere superiore a :max caratteri",
            'name.min' => "Il nome dev'essere di almeno :min caratteri",
            'content.required' => "E' necessario inserire la descrizione",
            'content.min' => "La descrizione dev'essere di almeno :min caratteri",

        ])->validate();

        return $validator;
    }
}
