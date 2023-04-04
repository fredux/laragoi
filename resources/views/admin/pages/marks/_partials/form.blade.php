@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control"  oninput="handleInput(event)"  placeholder="Nome:"  value="{{ $mark->name ?? old('name') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>

<script src="{{ asset('js/util.js') }}"></script>
