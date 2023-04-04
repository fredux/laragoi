@extends('adminlte::page')

@section('title', "Detalhes do Telefone {$phone->fone}")

@section('content_header')
    <h1>Detalhes do telefone <b>{{ $phone->fone }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Fone: </strong> {{ $phone->fone }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $phone->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('phones.destroy', $phone->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O TELEFONE {{ $phone->fone }}</button>
            </form>
        </div>
    </div>
@endsection
