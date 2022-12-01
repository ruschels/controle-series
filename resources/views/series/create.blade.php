<x-layout title="Nova Série">

	<form action="{{ route('series.store') }}" method="post">
		@csrf <!-- diretiva do blade que evita ataque de XSS e CSRF -->
		<div class="row mb-3 text-light">
				<div class="col-8">
					<label class="form-label" for="nome">Nome:</label>
					<input class="form-control" 
							type="text" 
							id="nome" 
							autofocus
							name="nome"	
							value="{{ old('nome') }}"				
							>
				</div>

				<div class="col-2">
					<label class="form-label" for="seasonsQty">Temporadas:</label>
					<input class="form-control" 
							type="text" 
							id="seasonsQty" 
							name="seasonsQty"	
							value="{{ old('seasonsQty') }}"				
							>
				</div>

				<div class="col-2">
					<label class="form-label" for="episodesPerSeason">Eps / Temporada:</label>
					<input class="form-control" 
							type="text" 
							id="episodesPerSeason" 
							name="episodesPerSeason"	
							value="{{ old('episodesPerSeason') }}"				
							>
				</div>
		</div>
			<button type="submit" class="btn btn-primary mt-2">Adicionar</button>
		</form>
</x-layout>