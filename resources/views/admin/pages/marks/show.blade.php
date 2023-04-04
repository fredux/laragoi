@extends('adminlte::page')

@section('title', "Detalhes da Marca {$mark->name}")

@section('content_header')
    <h1>Detalhes da marca <b>{{ $mark->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $mark->name }}
                </li>
            </ul>

            @include('admin.includes.alerts')
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletar">
                DELETAR A MARCA {{ $mark->name }}
            </button>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deletar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Excluir registro </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Confirma a exclusão da Marca {{ $mark->name }}
        </div>
        <div class="modal-footer">
            <form action="{{ route('marks.destroy', $mark->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancela</button>
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Confirma</button>
            </form>
        </div>
        </div>
    </div>
    </div>    
@endsection
