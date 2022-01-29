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
 * Class Restaurant
 *
 * @property int $idrestaurant
 * @property int $idcategorie_restaurant
 * @property string|null $nom_restaurant
 * @property string|null $login
 * @property string|null $mdp
 * @property string|null $adresse
 * @property string|null $contact
 * @property Carbon|null $date_creation
 *
 * @property CategorieRestaurant $categorie_restaurant
 * @property Collection|Caissier[] $caissiers
 * @property Collection|CategorieArticle[] $categorie_articles
 * @property Collection|Client[] $clients
 * @property Collection|Pointdevente[] $pointdeventes
 * @property Collection|Serveur[] $serveurs
 * @property Collection|Table[] $tables
 *
 * @package App\Models
 */
class Restaurant extends Model
{

	use HasFactory;
    use SoftDeletes;

	protected $table = 'restaurant';
	protected $primaryKey = 'idrestaurant';
	public $timestamps = false;

	protected $casts = [
		'idcategorie_restaurant' => 'int'
	];

	protected $dates = [
		'date_creation'
	];

	protected $fillable = [
		'idcategorie_restaurant',
		'iduser_restaurant',
		'nom_restaurant',
		'adresse',
		'contact',
		'date_creation'
	];


	public function user()
	{
		return $this->belongsTo(User::class, 'iduser_restaurant');
	}

	public function categorie_restaurant()
	{
		return $this->belongsTo(CategorieRestaurant::class, 'idcategorie_restaurant');
	}

	public function caissiers()
	{
		return $this->hasMany(Caissier::class, 'idrestaurant');
	}

	public function categorie_articles()
	{
		return $this->hasMany(CategorieArticle::class, 'idrestaurant');
	}

	public function clients()
	{
		return $this->hasMany(Client::class, 'idrestaurant');
	}

	public function pointdeventes()
	{
		return $this->hasMany(Pointdevente::class, 'idrestaurant');
	}

	public function serveurs()
	{
		return $this->hasMany(Serveur::class, 'idrestaurant');
	}

	public function tables()
	{
		return $this->hasMany(Table::class, 'idrestaurant');
	}

    public function espaces()
    {
        return $this->hasMany(Espace::class, 'idrestaurant');
    }
}
