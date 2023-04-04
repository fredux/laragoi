@extends('adminlte::page')

@section('title', 'Cadastrar Setor')

@section('content_header')
    <h1>Cadastrar Novo Setor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('sectors.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.sectors._partials.form')
            </form>
        </div>
    </div>
@endsection
