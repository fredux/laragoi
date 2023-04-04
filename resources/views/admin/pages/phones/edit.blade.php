@extends('adminlte::page')

@section('title', "Editar o Telefone { $phone->fone}")

@section('content_header')
    <h1>Editar o Telefone {{ $phone->fone }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('phones.update', $phone->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.phones._partials.form')
            </form>
        </div>
    </div>
@endsection
