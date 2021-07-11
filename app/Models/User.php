<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
/**
 * Class User
 *
 * @property string $id
 * @property string $username
 * @property string $name
 * @property string $role
 * @property string $password
 *
 * @property Collection|Availabletime[] $availabletimes
 * @property Collection|Rent[] $rents
 * @property Collection|Review[] $reviews
 *
 * @package App\Models
 */
class User extends Authenticatable
{

    use HasFactory, Notifiable,HasApiTokens,SoftDeletes;

    public const VALDATIONS_RULES_CEARTE=[
        // 'name' => ['required'],
        // 'email' => ['required',"unique:App\Models\User,email"],
        // 'username' => ['required',"unique:App\Models\User,username"],
        // 'password' => ['required']
    ];
	protected $table = 'user';
	// public $incrementing = false;
	// public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'name',
		'role',
		'password'
	];

	public function availabletimes()
	{
		return $this->hasMany(Availabletime::class, 'createdBy');
	}

	public function rents()
	{
		return $this->hasMany(Rent::class, 'rentedBy');
	}

	public function reviews()
	{
		return $this->hasMany(Review::class, 'writtenBy');
	}
}
