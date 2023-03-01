<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Models\Tecnology;
use Illuminate\Http\Request;

class TecnologyController extends Controller
{

    protected $validationRules = [
        'name' => 'required|max:18',
        'accent_color' => 'nullable',
        'bg_color' => 'nullable',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnologies = Tecnology::all();
        return view('admin.tecnologies.index', ['tecnologies' => $tecnologies]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tecnologies.create', ['tecnology' => new Tecnology()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules);
        $newtecnology = new tecnology();
        $newtecnology->fill($data);
        $newtecnology->save();

        return redirect()->route('admin.tecnologies.index')->with('message',"tecnology $newtecnology->name has benn created succesfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.tecnologies.show', compact('tecnology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tecnology $tecnology
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnology $tecnology)
    {
        return view('admin.tecnologies.edit',['tecnology' => $tecnology]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Tecnology $tecnology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnology $tecnology)
    {
        $updateValidation = $this->validationRules;
        array_push($updateValidation, Rule::unique('tecnologies')->ignore($tecnology->id));
        $data = $request->validate($this->validationRules);
        $tecnology->update($data);
        return redirect()->route('admin.tecnologies.show', compact('tecnology'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
