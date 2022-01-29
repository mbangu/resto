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
 * Class Devise
 *
 * @property int $iddevise
 * @property string $devise
 *
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class Devise extends Model
{

	use HasFactory;
    use SoftDeletes;

	protected $table = 'devise';
	protected $primaryKey = 'iddevise';
	public $timestamps = false;

	protected $fillable = [
		'devise'
	];

	public function articles()
	{
		return $this->hasMany(Article::class, 'iddevise');
	}
}
