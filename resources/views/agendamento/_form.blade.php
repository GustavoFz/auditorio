<div class="input-field col s8">
  <input type="text" name="numero" value="{{isset($registro->numero) ? $registro->numero : ''}}">
  <label>Número da sala</label>
</div>

<div class="input-field col s4">
	<select name="predio">
	  <option value="{{isset($registro->predio) ? $registro->predio : ''}}">{{isset($registro->predio) ? $registro->predio : ''}}</option>
	  <option value="A">A</option>
	  <option value="B">B</option>
	  <option value="C">C</option>
	  <option value="D">D</option>
	</select>
	<label>Prédio</label>
</div>

<div class="row">
<div class="input-field col s8">
	  <textarea name="descricao" rows="1" class="materialize-textarea">{{isset($registro->descricao) ? $registro->descricao : ''}}</textarea>
      <label for="descricao">Descrição</label>
</div>
</div>

<div class="row">
	<div class="input-field col s6">
	  <input type="text" name="capacidade" value="{{isset($registro->capacidade) ? $registro->capacidade : ''}}">
	  <label>Capacidade</label>
	</div>
</div>
