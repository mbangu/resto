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
 * Class CategorieRestaurant
 *
 * @property int $idcategorie_restaurant
 * @property string|null $categorie
 * @property string|null $description
 *
 * @property Collection|Restaurant[] $restaurants
 *
 * @package App\Models
 */
class CategorieRestaurant extends Model
{
	use HasFactory;
    use SoftDeletes;

	protected $table = 'categorie_restaurant';
	protected $primaryKey = 'idcategorie_restaurant';
	public $timestamps = false;

	protected $fillable = [
		'categorie',
		'description'
	];

	public function restaurants()
	{
		return $this->hasMany(Restaurant::class, 'idcategorie_restaurant');
	}
}
