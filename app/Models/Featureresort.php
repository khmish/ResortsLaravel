<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Featureresort
 *
 * @property int|null $number
 * @property string $Feature_id
 * @property string $Resort_id
 * @property string|null $description
 * @property string|null $media
 *
 * @property Feature $feature
 * @property Resort $resort
 *
 * @package App\Models
 */
class Featureresort extends Model
{
    use HasFactory,SoftDeletes;
	protected $table = 'featureresort';
	// public $incrementing = false;
	// public $timestamps = false;

	protected $casts = [
		'number' => 'int'
	];

	protected $fillable = [
		'number',
		'description',
		'media'
	];

	public function feature()
	{
		return $this->belongsTo(Feature::class, 'Feature_id');
	}

	public function resort()
	{
		return $this->belongsTo(Resort::class, 'Resort_id');
	}
}
