<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Support\Facades\DB;
use App\Repositories\SeriesRepository;
 
class SeriesController extends Controller
{
    
    public function index(Request $request)
    {
        $series = Series::all(); //all() é um método das Models. Series é uma Model. all() retorna uma COLLECTION - que pode ser acessada como um array

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create() {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, SeriesRepository $repository) { 
        
       $serie = $repository->add($request);

        $request->session()->flash('mensagem.sucesso', "Série {$serie->nome} adicionada com sucesso");

        return to_route('series.index'); // nova sintaxe para redirecionar


        //Outra forma de salvar:

        //$nomeSerie = $request->input('nome'); //estou pegando o nome da serie recebido no input
/*
        $nomeSerie = $request->nome; //o laravel busca automaticamente um campo Nome na requisicao, nao precisando do input('nome')

        $serie = new Serie();
        $serie->nome = $nomeSerie;

        $serie->save(); */
        
        //return redirect('/series'); ou entao

        //return redirect(route('series.index')); --enviando para o nome da rota

       


    }

    public function destroy(Series $series)
    {
        /*
        Serie::destroy($request->series); //o parametro ->series é o serie->id passado no foreach da view index

        $request->session()->flash('mensagem.sucesso', 'Série removida com sucesso'); //criar mensagem de sucesso que eh recuperada no metodo index
        */

        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série {$series->nome} removida com sucesso");
            //envia o flash message sem precisar usar o flash()
    }

    public function edit(Series $series)
    {
    return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    //recebe a serie a ser atualizada e o conteudo novo a ser enviado
    { 
        $series->nome = $request->nome;

        /*podemos usar um mass assignment

        $series->fill($request->all());
        assim o laravel consulta o atributo fillable da classe para preencher
        */
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }
}