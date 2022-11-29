<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $fillable = ['nome']; //campos que podem ser inseridos por mass assignment

    public function season()
    {
        return $this->hasMany(Season::class, 'series_id');
        // o segundo parametro é o nome escolhido para a chave estrangeira. Por padrao ele seria serie_id, de acordo com o nome da Class
        // alteramos porque queremos o nome em ingles no banco 
    }
}
