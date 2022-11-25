	<form action="{{ $action }}" method="post">
		@csrf <!-- diretiva do blade que evita ataque de XSS e CSRF -->

		@if($update)
		@method('PUT') <!-- Se for um update="true" (definido no edit.blade.php), usaremos o PUT -->
		@endif
		<div class="mb-3">
			<label class="form-label" for="nome">Nome:</label>
			<input class="form-control" 
					type="text" 
					id="nome" 
					name="nome"					
					@isset($nome) value="{{ $nome }}"@endisset>
		</div>
		<button type="submit" class="btn btn-primary mt-2">Adicionar</button>
		
	</form>
