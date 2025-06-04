<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Assignment
 * 
 * @property int $id
 * @property int $submission_id
 * @property int $user_id
 * @property Carbon $evaluation_deadline
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Submission $submission
 * @property User $user
 *
 * @package App\Models
 */
class Assignment extends Model
{
	protected $casts = [
		'id' => 'int',
		'submission_id' => 'int',
		'user_id' => 'int',
		'evaluation_deadline' => 'datetime'
	];

	protected $guarded = [];

	public function submission()
	{
		return $this->belongsTo(Submission::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
