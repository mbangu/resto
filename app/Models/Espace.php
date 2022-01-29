<?php

namespace App\Models;

use App\Models\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Espace extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name',
        'idrestaurant'
    ];


    public function tables()
    {
        return $this->hasMany(Table::class, 'idespace');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'idrestaurant');
    }
}
