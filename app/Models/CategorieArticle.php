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
 * Class CategorieArticle
 *
 * @property int $idcategorie_article
 * @property int $idrestaurant
 * @property string $categorie
 * @property string|null $description
 *
 * @property Restaurant $restaurant
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class CategorieArticle extends Model
{
	use HasFactory;
    use SoftDeletes;

	protected $table = 'categorie_article';
	protected $primaryKey = 'idcategorie_article';
	public $timestamps = false;

	protected $casts = [
		'idrestaurant' => 'int'
	];

	protected $fillable = [
		'idrestaurant',
		'categorie',
		'description'
	];

	public function restaurant()
	{
		return $this->belongsTo(Restaurant::class, 'idrestaurant');
	}

	public function articles()
	{
		return $this->hasMany(Article::class, 'idcategorie_article');
	}
}
