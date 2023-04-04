@extends('adminlte::page')

@section('title', 'Sistema Operacional')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('systems.index') }}" class="active">Sistema Operacional</a></li>
    </ol>

    <h1>Sistema Operacional <a href="{{ route('systems.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('systems.search') }}" method="POST" class="form form-inline">
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
                    @foreach ($systems as $system)
                        <tr>
                            <td>{{ $system->name }}</td>
                            <td>{{ $system->description }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('systems.edit', $system->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('systems.show', $system->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $systems->appends($filters)->links() !!}
            @else
                {!! $systems->links() !!}
            @endif
        </div>
    </div>
@stop
