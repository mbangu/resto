<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ValidationPaiement
 * 
 * @property int $idvalidation_paiement
 * @property Carbon|null $date_validation
 * @property int $idcommande
 * @property int $idcaissier
 * 
 * @property Caissier $caissier
 * @property Commande $commande
 *
 * @package App\Models
 */
class ValidationPaiement extends Model
{
	protected $table = 'validation_paiement';
	protected $primaryKey = 'idvalidation_paiement';
	public $timestamps = false;

	protected $casts = [
		'idcommande' => 'int',
		'idcaissier' => 'int'
	];

	protected $dates = [
		'date_validation'
	];

	protected $fillable = [
		'date_validation',
		'idcommande',
		'idcaissier'
	];

	public function caissier()
	{
		return $this->belongsTo(Caissier::class, 'idcaissier');
	}

	public function commande()
	{
		return $this->belongsTo(Commande::class, 'idcommande');
	}
}
