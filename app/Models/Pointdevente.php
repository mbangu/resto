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
 * Class Pointdevente
 *
 * @property int $idpointdevente
 * @property int $idrestaurant
 * @property string $pointdevente
 * @property string|null $description
 *
 * @property Restaurant $restaurant
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class Pointdevente extends Model
{
	use HasFactory;
    use SoftDeletes;

	protected $table = 'pointdevente';
	protected $primaryKey = 'idpointdevente';
	public $timestamps = false;

	protected $casts = [
		'idrestaurant' => 'int'
	];

	protected $fillable = [
		'idrestaurant',
		'pointdevente',
		'description'
	];

	public function restaurant()
	{
		return $this->belongsTo(Restaurant::class, 'idrestaurant');
	}

	public function articles()
	{
		return $this->hasMany(Article::class, 'idpointdevente');
	}
}
