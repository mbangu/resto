<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Commande
 *
 * @property int $idcommande
 * @property int $idtable
 * @property int $idserveur
 * @property int|null $idclient
 * @property string|null $numero_cmd
 * @property int|null $valide
 * @property Carbon|null $date
 * @property string|null $nom_client
 *
 * @property Client|null $client
 * @property Serveur $serveur
 * @property Table $table
 * @property Collection|Article[] $articles
 * @property Collection|ValidationPaiement[] $validation_paiements
 *
 * @package App\Models
 */
class Commande extends Model
{

	use HasFactory;
    use SoftDeletes;

	protected $table = 'commande';
	protected $primaryKey = 'idcommande';
	public $timestamps = false;

	protected $casts = [
		'idtable' => 'int',
		'idserveur' => 'int',
		'valide' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'idtable',
		'idserveur',
		'idclient',
		'nom_client',
		'numero_cmd',
		'date',
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'idclient');
	}

	public function serveur()
	{
		return $this->belongsTo(Serveur::class, 'idserveur');
	}

	public function table()
	{
		return $this->belongsTo(Table::class, 'idtable');
	}

//	public function articles()
//	{
//		return $this->belongsToMany(Article::class, 'article_commande', 'idcommande', 'idarticle');
//	}

    public function articles()
    {
        return $this->hasMany(ArticleCommande::class, 'idcommande');
    }


	public function validation_paiements()
	{
		return $this->hasMany(ValidationPaiement::class, 'idcommande');
	}
}
