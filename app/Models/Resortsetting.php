<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Resortsetting
 *
 * @property string $id
 * @property int|null $cost
 * @property int|null $costWeekend
 * @property int|null $startTime
 * @property int|null $endTime
 * @property int|null $defaultRentHours
 * @property string $Resort_id
 *
 * @property Resort $resort
 *
 * @package App\Models
 */
class Resortsetting extends Model
{
    use HasFactory,SoftDeletes;
	protected $table = 'resortsettings';
	// public $incrementing = false;
	// public $timestamps = false;

	protected $casts = [
		'cost' => 'int',
		'costWeekend' => 'int',
		'startTime' => 'int',
		'endTime' => 'int',
		'defaultRentHours' => 'int'
	];

	protected $fillable = [
		'cost',
		'costWeekend',
		'startTime',
		'endTime',
		'defaultRentHours',
		'Resort_id'
	];

	public function resort()
	{
		return $this->belongsTo(Resort::class, 'Resort_id');
	}
}
