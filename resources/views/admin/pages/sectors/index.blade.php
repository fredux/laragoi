@extends('adminlte::page')

@section('title', 'Setor')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('sectors.index') }}" class="active">Setor</a></li>
    </ol>

    <h1>Setor <a href="{{ route('sectors.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('sectors.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sectors as $sector)
                        <tr>
                            <td>{{ $sector->name }}</td>
                            <td>{{ $sector->description }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('sectors.edit', $sector->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('sectors.show', $sector->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $sectors->appends($filters)->links() !!}
            @else
                {!! $sectors->links() !!}
            @endif
        </div>
    </div>
@stop
