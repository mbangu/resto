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
 * Class Client
 * 
 * @property int $idclient
 * @property int $idrestaurant
 * @property string $client
 * @property string $code
 * @property string|null $telephone
 * @property Carbon|null $date_creation
 * 
 * @property Restaurant $restaurant
 * @property Collection|Commande[] $commandes
 *
 * @package App\Models
 */
class Client extends Model
{
	use HasFactory;
	use SoftDeletes;
	
	protected $table = 'client';
	protected $primaryKey = 'idclient';
	public $timestamps = false;

	protected $casts = [
		'idrestaurant' => 'int'
	];

	protected $dates = [
		'date_creation'
	];

	protected $fillable = [
		'idrestaurant',
		'client',
		'code', 
		'telephone',
		'date_creation'
	];

	public function restaurant()
	{
		return $this->belongsTo(Restaurant::class, 'idrestaurant');
	}

	public function commandes()
	{
		return $this->hasMany(Commande::class, 'idclient');
	}
}
