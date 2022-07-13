<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $correo
 * @property string|null $address
 * @property int|null $age
 * @property string|null $sex
 * @property Carbon|null $created_at
 * @property string|null $deleted_at
 * @property Carbon|null $updated_at
 * @property int|null $id_user
 *
 * @package App\Models
 */
class Customer extends Model
{
	use SoftDeletes;
	protected $table = 'customer';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'age' => 'int',
		'id_user' => 'int'
	];

	protected $fillable = [
		'name',
		'phone',
		'correo',
		'address',
		'age',
		'sex',
		'id_user'
	];
}
