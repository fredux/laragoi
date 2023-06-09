@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control"  oninput="handleInput(event)"  placeholder="Nome:"  value="{{ $sector->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="textarea" class="form-control"  name="description" class="form-control"   placeholder="Descrição:" 
    value= "{{ $sector->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>

<script src="{{ asset('js/util.js') }}"></script>
