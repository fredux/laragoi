@extends('adminlte::page')

@section('title', 'Cadastrar Marcas')

@section('content_header')
    <h1>Cadastrar Nova Marca</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('marks.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.marks._partials.form')
            </form>
        </div>
    </div>
@endsection
