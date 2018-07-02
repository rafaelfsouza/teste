@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Categoria</div>

                <div class="row">

                    <div class="col-md-10 col-md-offset-1">

                        <form method="post" action="{{ route('categorias.update', ['id' => $categoria->id]) }}">
                                
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">

                            <div class="row">
                                    
                                <br clear="all" />

                                <div class="form-group">
                                    <label for="categoria">Categoria</label>
                                    <input type="text" name="categoria" id="categoria" required class="form-control" value="{{ $categoria->categoria }}">
                                </div>

                                <div class="form-group form-check">
                                    <input type="hidden" name="ativo" value="0">
                                    <input type="checkbox" name="ativo" id="ativo" value="1" class="form-check-input" {{ ($categoria->ativo) ? 'checked' : '' }}>
                                    <label for="ativo" class="form-check-label">Ativo</label>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary">Salvar</button>
                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
