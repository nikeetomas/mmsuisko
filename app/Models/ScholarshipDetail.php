<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ScholarshipDetail
 * 
 * @property int $id
 * @property int $scholarship_id
 * @property string $appli_poli
 * @property string $qualification
 * @property string $amount_of_grant
 * @property string $gen_guideline
 * @property string $contact_info
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ScholarshipDetail extends Model
{
	protected $table = 'scholarship_details';


	protected $casts = [
		'scholarship_id' => 'int'
	];

	protected $fillable = [
		'scholarship_id',
		'appli_poli',
		'qualification',
		'amount_of_grant',
		'gen_guideline',
		'contact_info'
	];

	public function scholarship(){
		return $this->belongsTo(Scholarship::class);
	}
	
	
}
