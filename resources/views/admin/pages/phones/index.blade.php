@extends('adminlte::page')

@section('title', 'Telefones')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('phones.index') }}" class="active">Phones</a></li>
    </ol>

    <h1>Telefones <a href="{{ route('phones.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('phones.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Fone</th>
                        <th>Descrição</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $phones as  $phone)
                        <tr>
                            <td>{{  $phone->fone }}</td>
                            <td>{{  $phone->description }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('phones.edit', $phone->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('phones.show', $phone->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $phones->appends($filters)->links() !!}
            @else
                {!! $phones->links() !!}
            @endif
        </div>
    </div>
@stop
