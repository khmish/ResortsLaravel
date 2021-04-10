<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Review
 *
 * @property string $id
 * @property int|null $totalStars
 * @property string|null $comment
 * @property string $writtenBy
 * @property string $Resort_id
 *
 * @property Resort $resort
 * @property User $user
 *
 * @package App\Models
 */
class Review extends Model
{
    use SoftDeletes;
	protected $table = 'review';
	public $incrementing = false;
	// public $timestamps = false;

	protected $casts = [
		'totalStars' => 'int'
	];

	protected $fillable = [
		'totalStars',
		'comment',
		'writtenBy',
		'Resort_id'
	];

	public function resort()
	{
		return $this->belongsTo(Resort::class, 'Resort_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'writtenBy');
	}
}
