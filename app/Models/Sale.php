<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sale
 * 
 * @property int $id
 * @property string|null $folio
 * @property int|null $id_customer
 * @property int|null $status
 * @property int|null $payeds_in_months
 * @property float|null $payed_mounth
 * @property float|null $payed
 * @property float|null $total_debt
 * @property Carbon|null $created_at
 * @property string|null $deleted_at
 * @property Carbon|null $updated_at
 * @property float|null $deposit
 *
 * @package App\Models
 */
class Sale extends Model
{
	use SoftDeletes;
	protected $table = 'sales';

	protected $casts = [
		'id_customer' => 'int',
		'status' => 'int',
		'payeds_in_months' => 'int',
		'payed_mounth' => 'float',
		'payed' => 'float',
		'total_debt' => 'float',
		'deposit' => 'float'
	];

	protected $fillable = [
		'folio',
		'id_customer',
		'status',
		'payeds_in_months',
		'payed_mounth',
		'payed',
		'total_debt',
		'deposit'
	];
}
