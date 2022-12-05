<?php 

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;


class EpisodesController

{
    public function index(Season $season)
    {
        return view('episodes.index', 
            ['episodes' => $season->episodes,
                'season'=> $season,
                'mensagemSucesso' => session('mensagem.sucesso'),
                'watched'=> 0]);
        
    }

    public function update(Request $request, Season $season) 
    {
        $watchedEpisodes = $request->episodes; //lista de eps marcados pelo checkbox

        $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) //vai executar a funcao para CADA episode da season
            {
            $episode->watched = in_array($episode->id, $watchedEpisodes); /* marca como assistido se o $episode->id 
                estiver dentro do $watchedEpisodes */
            });

        $season->push();

        return to_route('episodes.index', $season->id)
            ->with('mensagem.sucesso', 'Episódios marcados como assistidos');

    }
}