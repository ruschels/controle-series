<x-layout title="Nova Série">
	<form action="{{  route('series.store') }}" method="post">
		@csrf <!-- diretiva do blade que evita ataque de XSS e CSRF -->
		<div class="mb-3">
			<label class="form-label" for="nome">Nome:</label>
			<input class="form-control" type="text" id="nome" name="nome">
				<button type="submit" class="btn btn-primary mt-2">Adicionar</button>
		</div>
	</form>
</x-layout>