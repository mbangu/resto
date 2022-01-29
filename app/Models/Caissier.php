<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Caissier
 * 
 * @property int $idcaissier
 * @property int $idrestaurant
 * @property string|null $caissier
 * @property string|null $login
 * @property string|null $mdp
 * 
 * @property Restaurant $restaurant
 * @property Collection|ValidationPaiement[] $validation_paiements
 *
 * @package App\Models
 */
class Caissier extends Model
{
	protected $table = 'caissier';
	protected $primaryKey = 'idcaissier';
	public $timestamps = false;

	protected $casts = [
		'idrestaurant' => 'int'
	];

	protected $fillable = [
		'idrestaurant',
		'caissier',
		'login',
		'mdp'
	];

	public function restaurant()
	{
		return $this->belongsTo(Restaurant::class, 'idrestaurant');
	}

	public function validation_paiements()
	{
		return $this->hasMany(ValidationPaiement::class, 'idcaissier');
	}
}
