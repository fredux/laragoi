@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" oninput="handleInput(event)"  value="{{ $status->name ?? old('name') }}" >
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>

<script src="{{ asset('js/util.js') }}"></script>
