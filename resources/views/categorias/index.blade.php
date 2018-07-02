@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias</div>

                <div class="row">
                    
                    <div class="col-md-10 col-md-offset-1">

                        @if (session('status'))
                            <div class="panel-body">
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            </div>
                        @endif

                        <p class="text-right">
                            <br />
                            <a href="{{ route('categorias.create') }}">Nova</a>
                        </p>

                        <table class="table table-striped">
                            <tr>
                                <th>Categoria</th>
                                <th></th>
                            </tr>
                            @foreach($categorias as $categoria)
                                <tr class="{{ (!$categoria->ativo) ? 'danger text-danger' : '' }}">
                                    <td>{{ $categoria->categoria }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('categorias.edit', ['id' => $categoria->id]) }}" style="display: inline">editar</a>
                                        <form method="post" action="{{ route('categorias.destroy', ['id' => $categoria->id]) }}" style="display: inline">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <button class="btn-delete btn-link">apagar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="text-center">{{ $categorias->links() }}</div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection