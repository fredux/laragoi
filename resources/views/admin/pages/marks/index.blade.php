@extends('adminlte::page')

@section('title', 'Marca')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('marks.index') }}" class="active">Marcas</a></li>
    </ol>

    <h1>Marcas <a href="{{ route('marks.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('marks.search') }}" method="POST" class="form form-inline">
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
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marks as $mark)
                        <tr>
                            <td>{{ $mark->name }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('marks.edit', $mark->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('marks.show', $mark->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $marks->appends($filters)->links() !!}
            @else
                {!! $marks->links() !!}
            @endif
        </div>
    </div>
@stop
