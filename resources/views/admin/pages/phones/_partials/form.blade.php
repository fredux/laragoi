@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" id="fone" name="fone" class="form-control"  maxlength="15" onkeyup="handlePhone(event)"  
     placeholder="(99) 9999-9999"  value="{{ $phone->fone ?? old('fone') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="textarea" name="description" class="form-control"  placeholder="Descrição:"  value="{{ $phone->description ?? old('description') }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>

<script src="{{ asset('js/util.js') }}"></script>
