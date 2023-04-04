@extends('adminlte::page')

@section('title', 'Status')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('status.index') }}" class="active">Status</a></li>
    </ol>

    <h1>Status <a href="{{ route('status.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('status.search') }}" method="POST" class="form form-inline">
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
                    @foreach ($status as $item_status)
                        <tr>
                            <td>{{ $item_status->name }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('status.edit', $item_status->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('status.show', $item_status->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $status->appends($filters)->links() !!}
            @else
                {!! $status->links() !!}
            @endif
        </div>
    </div>
@stop
