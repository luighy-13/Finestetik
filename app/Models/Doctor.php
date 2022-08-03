<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Doctor
 * 
 * @property int $id
 * @property string|null $doctor
 * @property string|null $specialty
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Doctor extends Model
{
	use SoftDeletes;
	protected $table = 'doctors';

	protected $fillable = [
		'doctor',
		'specialty',
		'email',
		'phone',
		'address'
	];
}
