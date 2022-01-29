<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Serveur
 *
 * @property int $idserveur
 * @property int $idrestaurant
 * @property string $serveur
 * @property int $iduser_serveur
 *
 * @property Restaurant $restaurant
 * @property Collection|Commande[] $commandes
 *
 * @package App\Models
 */
class Serveur extends Model
{

	use HasFactory;
    use SoftDeletes;

	protected $table = 'serveur';
	protected $primaryKey = 'idserveur';
	public $timestamps = false;

	protected $casts = [
		'idrestaurant' => 'int'
	];

	protected $fillable = [
		'idrestaurant',
		'serveur',
		'iduser_serveur',
	];

	public function user()
	{
		return $this->belongsTo(User::class,'iduser_serveur');
	}

	public function restaurant()
	{
		return $this->belongsTo(Restaurant::class, 'idrestaurant');
	}

	public function commandes()
	{
		return $this->hasMany(Commande::class, 'idserveur');
	}
}
