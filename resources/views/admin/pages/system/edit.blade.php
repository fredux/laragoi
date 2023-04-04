@extends('adminlte::page')

@section('title', "Editar o Sistema Operacional {$system->name}")

@section('content_header')
    <h1>Editar o system {{ $system->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('systems.update', $system->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.system._partials.form')
            </form>
        </div>
    </div>
@endsection
