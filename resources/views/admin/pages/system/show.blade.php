@extends('adminlte::page')

@section('title', "Detalhes do Sistema Operacional {$system->name}")

@section('content_header')
    <h1>Detalhes do Sistema Operacional <b>{{ $system->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $system->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $system->description }}
                </li>

            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('systems.destroy', $system->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O SISTEMA OPERACIONAL {{ $system->name }}</button>
            </form>
        </div>
    </div>
@endsection
