<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Resortpic
 *
 * @property string $id
 * @property string|null $media
 * @property string $Resort_id
 *
 * @property Resort $resort
 *
 * @package App\Models
 */
class Resortpic extends Model
{
    use SoftDeletes;
	protected $table = 'resortpics';
	public $incrementing = false;
	// public $timestamps = false;

	protected $fillable = [
		'media',
		'Resort_id'
	];

	public function resort()
	{
		return $this->belongsTo(Resort::class, 'Resort_id');
	}
}
