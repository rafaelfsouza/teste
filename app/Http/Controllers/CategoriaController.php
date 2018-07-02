<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaRepository;

class CategoriaController extends Controller
{

    protected $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepository){
        $this->categoriaRepository = $categoriaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = $this->categoriaRepository->listagem();
        return view('categorias.index')->with(compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $categoria = $this->categoriaRepository->store($input);
        $request->session()->flash('status', 'Categoria Inserida');
        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = $this->categoriaRepository->show($id);
        return view('categorias.edit')->with(compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $categoria = $this->categoriaRepository->update($id, $input);
        $request->session()->flash('status', 'Categoria Editada');
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->categoriaRepository->delete($id);
        $request->session()->flash('status', 'Categoria Excluída');
        return redirect()->route('categorias.index');
    }
}
