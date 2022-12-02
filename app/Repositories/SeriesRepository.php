<?php 

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Support\Facades\DB;

class SeriesRepository
{
    public function add(SeriesFormRequest $request) : Series //retorna uma Serie 
        
        {
        return DB::transaction(function() use ($request, &$serie) {
            // inicia uma transacao e faz o commit no final. Se algo der errado, ele automaticamente desfaz tudo
            
            $serie = Series::create($request->all()); //salva dos os dados do request por mass assignment. Além do all() temos o only() 
            // nao precisa usar o save()

            $seasons = [];
            for ($i = 1; $i <= $request->seasonsQty; $i++) {
                $seasons[] = [
                    'series_id'=> $serie->id,
                    'number' => $i,
                ];
            }
            Season::insert($seasons);

            $episodes = [];

            foreach ($serie->seasons as $season) {
                for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                    $episodes[] =  [
                        'season_id'=> $season->id,
                        'number' => $j
                    ];
                }
            }

            Episode::insert($episodes);

            return $serie;

        });
    }
}