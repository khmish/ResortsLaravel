<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Rent
 *
 * @property string $id
 * @property string $rentedBy
 * @property Carbon|null $rentedDate
 * @property int|null $state
 * @property string $AvailableTime_id
 *
 * @property Availabletime $availabletime
 * @property User $user
 *
 * @package App\Models
 */
class Rent extends Model
{
    use HasFactory,SoftDeletes;
	protected $table = 'rent';
	// public $incrementing = false;
	// public $timestamps = false;

	protected $casts = [
		'state' => 'int'
	];

	protected $dates = [
		'rentedDate'
	];

	protected $fillable = [
		'rentedBy',
		'rentedDate',
		'state',
		'AvailableTime_id'
	];

	public function availabletime()
	{
		return $this->belongsTo(Availabletime::class, 'AvailableTime_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'rentedBy');
	}
}
