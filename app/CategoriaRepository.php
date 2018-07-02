<?php

namespace App;

class CategoriaRepository
{
   public function listagem($total = 10){
   	return Categoria::orderBy('categoria')->paginate($total);		
   }

   public function show($id){
   	return Categoria::find($id);
   }

   public function store($input){
   	return Categoria::create($input);
   }

   public function update($id, $input){
   	$categoria = Categoria::find($id);
   	return $categoria->update($input);
   }

   public function delete($id){
   	$categoria = Categoria::find($id);
   	return $categoria->delete();
   }

}
