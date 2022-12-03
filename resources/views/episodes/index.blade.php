<x-layout title="Episódios da Temporada {!! $season !!}">
	
	<form method="post">
		<ul class="list-group">
			@foreach ($episodes as $episode)
			@csrf
			<li class="list-group-item d-flex justify-content-between align-items-center">			
				Episódio {{$episode->number}}
				<input type="checkbox" name="episodes[]" value="{{ $episode->id }}">
			</li>
			@endforeach
		</ul>

		<button class="btn btn-primary mt-2 mb-2">Salvar</button>
	</form>
</x-layout>