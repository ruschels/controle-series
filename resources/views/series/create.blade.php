<x-layout title="Nova Série">
	<x-series.form :action="route('series.store')" :nome="old('nome')" :update="false" /> <!-- definimos a variavel $action que é preenchida no action do form.blade -->

</x-layout>