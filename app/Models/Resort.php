<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Resort
 *
 * @property string $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $longitude
 * @property string|null $latitude
 * @property string|null $media
 *
 * @property Collection|Availabletime[] $availabletimes
 * @property Collection|Feature[] $features
 * @property Collection|Resortpic[] $resortpics
 * @property Collection|Resortsetting[] $resortsettings
 * @property Collection|Review[] $reviews
 *
 * @package App\Models
 */
class Resort extends Model
{
    use SoftDeletes;
	protected $table = 'resort';
	public $incrementing = false;
	// public $timestamps = false;

	protected $fillable = [
		'name',
		'description',
		'longitude',
		'latitude',
		'media'
	];

	public function availabletimes()
	{
		return $this->hasMany(Availabletime::class, 'Resort_id');
	}

	public function features()
	{
		return $this->belongsToMany(Feature::class, 'featureresort', 'Resort_id', 'Feature_id')
					->withPivot('number', 'description', 'media');
	}

	public function resortpics()
	{
		return $this->hasMany(Resortpic::class, 'Resort_id');
	}

	public function resortsettings()
	{
		return $this->hasMany(Resortsetting::class, 'Resort_id');
	}

	public function reviews()
	{
		return $this->hasMany(Review::class, 'Resort_id');
	}
}
