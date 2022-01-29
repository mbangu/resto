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
 * Class Article
 *
 * @property int $idarticle
 * @property int $idcategorie_article
 * @property int $idpointdevente
 * @property string $article
 * @property string|null $description
 * @property string|null $image
 * @property int $iddevise
 * @property float|null $prix
 *
 * @property CategorieArticle $categorie_article
 * @property Devise $devise
 * @property Pointdevente $pointdevente
 * @property Collection|Commande[] $commandes
 *
 * @package App\Models
 */
class Article extends Model
{

	use HasFactory;
    use SoftDeletes;

	protected $table = 'article';
	protected $primaryKey = 'idarticle';
	public $timestamps = false;

	protected $casts = [
		'idcategorie_article' => 'int',
		'idpointdevente' => 'int',
		'iddevise' => 'int',
		'prix' => 'float'
	];

	protected $fillable = [
		'idcategorie_article',
		'idpointdevente',
		'article',
		'description',
		'image',
		'iddevise',
		'prix'
	];

	public function categorie_article()
	{
		return $this->belongsTo(CategorieArticle::class, 'idcategorie_article');
	}

	public function devise()
	{
		return $this->belongsTo(Devise::class, 'iddevise');
	}

	public function pointdevente()
	{
		return $this->belongsTo(Pointdevente::class, 'idpointdevente');
	}

	public function commandes()
	{
		return $this->belongsToMany(Commande::class, 'article_commande', 'idarticle', 'idcommande');
	}
}
