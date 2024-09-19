<div>
<input
    type="checkbox"
    id="cartaoUSP"
    name="docs[]"
    value="cartaoUSP" />
<label for="cartao_USP"> Cartão USP </label>
</div>
<form><div>
<input
    type="checkbox"
    id="bilheteUSP"
    name="docs[]"
    value="bilheteUSP" />
<label for="bilheteUSP"> Bilhete USP </label>
</div>
<form><div>
<input
    type="checkbox"
    id="Diploma"
    name="docs[]"
    value="diploma" />
<label for="Diploma"> Diploma </label>
</div>
Outro: <input type="text" name="docs[]" value="{{$retirada->documento}}"><br><br>

<button type="submit" class="btn btn-primary"> Confirmar </button>
