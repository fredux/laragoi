@extends('adminlte::page')

@section('title', 'Cadastrar Telefones')

@section('content_header')
    <h1>Cadastrar Novo Telefone</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('phones.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.phones._partials.form')
            </form>
        </div>
    </div>
@endsection
