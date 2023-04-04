@extends('adminlte::page')

@section('title', "Detalhes do Setor {$sector->name}")

@section('content_header')
    <h1>Detalhes do Setor <b>{{ $sector->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $sector->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $sector->description }}
                </li>
                
            </ul>

            @include('admin.includes.alerts')
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletar">
                DELETAR O SETOR {{ $sector->name }}
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
            Confirma a exclusão?
        </div>
        <div class="modal-footer">
            <form action="{{ route('sectors.destroy', $sector->id) }}" method="POST">
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
