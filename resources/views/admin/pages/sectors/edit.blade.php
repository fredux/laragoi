@extends('adminlte::page')

@section('title', "Editar o Setor {$sector->name}")

@section('content_header')
    <h1>Editar o Setor {{ $sector->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('sectors.update', $sector->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.sectors._partials.form')
            </form>
        </div>
    </div>
@endsection
