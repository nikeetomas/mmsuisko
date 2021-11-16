<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fund
 * 
 * @property int $fund_id
 * @property string $fund
 * @property int $part
 * @property string $fund_desc
 * @property int $opt
 * @property int $course_type_id
 * @property int $college_id
 * @property int $degree_id
 * @property int $standing
 * @property int $degree_type
 * @property int $free_educ
 * @property int|null $nef
 *
 * @package App\Models
 */
class Fund extends Model
{
	protected $table = 'fund';
	protected $primaryKey = 'fund_id';
	public $timestamps = false;

	protected $casts = [
		'part' => 'int',
		'opt' => 'int',
		'course_type_id' => 'int',
		'college_id' => 'int',
		'degree_id' => 'int',
		'standing' => 'int',
		'degree_type' => 'int',
		'free_educ' => 'int',
		'nef' => 'int'
	];

	protected $fillable = [
		'fund',
		'part',
		'fund_desc',
		'opt',
		'course_type_id',
		'college_id',
		'degree_id',
		'standing',
		'degree_type',
		'free_educ',
		'nef'
	];
}
