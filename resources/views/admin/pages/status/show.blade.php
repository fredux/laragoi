@extends('adminlte::page')

@section('title', "Detalhes do status {$status->name}")

@section('content_header')
    <h1>Detalhes do status <b>{{ $status->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $status->name }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('status.destroy', $status->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O STATUS {{ $status->name }}</button>
            </form>
        </div>
    </div>
@endsection
