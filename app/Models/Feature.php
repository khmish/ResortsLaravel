<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Feature
 *
 * @property string $id
 * @property string|null $name
 *
 * @property Collection|Resort[] $resorts
 *
 * @package App\Models
 */
class Feature extends Model
{
    use HasFactory,SoftDeletes;
	protected $table = 'feature';
	// public $incrementing = false;
	// public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function resorts()
	{
		return $this->belongsToMany(Resort::class, 'featureresort', 'Feature_id', 'Resort_id')
					->withPivot('number', 'description', 'media');
	}
}
