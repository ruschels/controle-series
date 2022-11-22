<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Serie;
 
class SeriesController extends Controller
{
    
    public function index(Request $request)
    {
        $series = Serie::all(); //all() é um método das Models. Series é uma Model. all() retorna uma COLLECTION - que pode ser acessada como um array

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create() {
        return view('series.create');
    }

    public function store(Request $request) {
        
        $serie = Serie::create($request->all()); //salva dos os dados do request por mass assignment. Além do all() temos o only() 

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

    public function destroy(Serie $series)
    {
        /*
        Serie::destroy($request->series); //o parametro ->series é o serie->id passado no foreach da view index

        $request->session()->flash('mensagem.sucesso', 'Série removida com sucesso'); //criar mensagem de sucesso que eh recuperada no metodo index
        */

        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série {$serie->nome} removida com sucesso");
            //envia o flash message sem precisar usar o flash()
    }
}