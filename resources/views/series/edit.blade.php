<x-layout title="Editar Série '{{$serie->nome}}'">
	<x-series.form :action="route('series.update', $serie->id)" :nome="$serie->nome" /> <!-- enviamos também a variavel $nome para ser preenchida no form -->

</x-layout>