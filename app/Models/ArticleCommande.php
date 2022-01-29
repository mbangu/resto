<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ArticleCommande
 *
 * @property int $idarticle_commande
 * @property int $idarticle
 * @property int $idcommande
 * @property int|null $qte
 * @property float|null $prix
 * @property string|null $devise
 * @property float|null $total
 * @property int|null $pretalivre
 *
 * @property Article $article
 * @property Commande $commande
 *
 * @package App\Models
 */
class ArticleCommande extends Model
{

	use HasFactory;
    use SoftDeletes;

	protected $table = 'article_commande';
	protected $primaryKey = 'idarticle_commande';
	public $timestamps = false;

	protected $casts = [
		'idarticle' => 'int',
		'idcommande' => 'int',
		'qte' => 'int',
		'prix' => 'float',
		'pretalivre' => 'int'
	];

	protected $dates = [
		'date',
	];

	protected $fillable = [
		'idarticle',
		'idcommande',
		'qte',
		'prix',
		'devise',
		'date',
		'pretalivre'
	];

	public function article()
	{
		return $this->belongsTo(Article::class, 'idarticle');
	}

	public function commande()
	{
		return $this->belongsTo(Commande::class, 'idcommande');
	}
}
