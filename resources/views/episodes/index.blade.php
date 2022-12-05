<x-layout title="Episódios da Temporada {!! $season->number !!}" :mensagem-sucesso="$mensagemSucesso">
	
		@foreach ($episodes as $episode)
			@if ($episode->watched) <?php $watched++ ?> @endif
		@endforeach



			<span class= "badge bg-secondary mb-3">
                {{ "Assistidos: " .  $watched . " / " . $season->episodes->count() }}
            </span>

	<form method="post">
		<ul class="list-group">
			@foreach ($episodes as $episode)
			@csrf
			<li class="list-group-item d-flex justify-content-between align-items-center">			
				Episódio {{$episode->number}}
				<input type="checkbox"
						name="episodes[]" 
						value="{{ $episode->id }}"
						@if ($episode->watched) checked	@endif  />

			</li>
			@endforeach
		</ul>





		<button class="btn btn-primary mt-2 mb-2">Salvar</button>
	</form>
</x-layout>