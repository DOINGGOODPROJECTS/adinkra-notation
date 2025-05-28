<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Evaluation
 * 
 * @property int $id
 * @property int $submission_id
 * @property int $jury_id
 * @property int $criteria_id
 * @property float $score
 * @property string|null $comments
 * @property Carbon|null $evaluated_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Submission $submission
 * @property User $user
 * @property EvaluationCriterion $evaluation_criterion
 *
 * @package App\Models
 */
class Evaluation extends Model
{
	use SoftDeletes;

	protected $casts = [
		'submission_id' => 'int',
		'jury_id' => 'int',
		'criteria_id' => 'int',
		'score' => 'float',
		'evaluated_at' => 'datetime'
	];

	protected $guarded = [];

	public function submission()
	{
		return $this->belongsTo(Submission::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'jury_id');
	}

	public function evaluation_criterion()
	{
		return $this->belongsTo(EvaluationCriterion::class, 'criteria_id');
	}
}
