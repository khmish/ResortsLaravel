<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Availabletime
 *
 * @property string $id
 * @property Carbon|null $availableDate
 * @property string $createdBy
 * @property int|null $startTime
 * @property int|null $endTime
 * @property string $Resort_id
 * @property int|null $cost
 *
 * @property Resort $resort
 * @property User $user
 * @property Collection|Rent[] $rents
 *
 * @package App\Models
 */
class Availabletime extends Model
{
    use SoftDeletes;
	protected $table = 'availabletime';
	public $incrementing = false;
	// public $timestamps = false;

	protected $casts = [
		'startTime' => 'int',
		'endTime' => 'int',
		'cost' => 'int'
	];

	protected $dates = [
		'availableDate'
	];

	protected $fillable = [
		'availableDate',
		'createdBy',
		'startTime',
		'endTime',
		'Resort_id',
		'cost'
	];

	public function resort()
	{
		return $this->belongsTo(Resort::class, 'Resort_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'createdBy');
	}

	public function rents()
	{
		return $this->hasMany(Rent::class, 'AvailableTime_id');
	}
}
