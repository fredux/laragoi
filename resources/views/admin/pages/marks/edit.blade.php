@extends('adminlte::page')

@section('title', "Editar a Marca {$mark->name}")

@section('content_header')
    <h1>Editar a Marca {{ $mark->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('marks.update', $mark->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.marks._partials.form')
            </form>
        </div>
    </div>
@endsection
