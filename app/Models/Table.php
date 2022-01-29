<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Models\Espace;
use App\Models\Commande;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Table
 *
 * @property int $idtable
 * @property int $idrestaurant
 * @property string|null $numero_table
 *
 * @property Restaurant $restaurant
 * @property Collection|Commande[] $commandes
 *
 * @package App\Models
 */
class Table extends Model
{
	use HasFactory;
    use SoftDeletes;

	protected $table = 'table';
	protected $primaryKey = 'idtable';
	public $timestamps = false;

	protected $casts = [
		'idrestaurant' => 'int'
	];

	protected $fillable = [
		'idrestaurant',
		'numero_table',
        'idespace',
        'nb_places',
	];

	public function restaurant()
	{
		return $this->belongsTo(Restaurant::class, 'idrestaurant');
	}

	public function commandes()
	{
		return $this->hasMany(Commande::class, 'idtable');
	}

    public function espace()
    {
        return $this->belongsTo(Espace::class, 'idespace');
    }
}
