<x-layout title="Editar Série '{!! $serie->nome !!}'">

		<form action="{{ route('series.update', $serie->id) }}" method="post">
		@csrf <!-- diretiva do blade que evita ataque de XSS e CSRF -->
		@method("PUT");
			<div class="mb-3">
				<label class="form-label" for="nome">Nome:</label>
				<input class="form-control" 
						type="text" 
						id="nome" 
						name="nome"	
						value="{{ $serie->nome }}"				
						>
			</div>
			<button type="submit" class="btn btn-primary mt-2">Adicionar</button>
		</form>
</x-layout>