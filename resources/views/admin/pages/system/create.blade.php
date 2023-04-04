@extends('adminlte::page')

@section('title', 'Cadastrar Sistema Operacional')

@section('content_header')
    <h1>Cadastrar Novo Sistema Operacional</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('systems.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.system._partials.form')
            </form>
        </div>
    </div>
@endsection
