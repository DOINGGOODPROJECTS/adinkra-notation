<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EvaluationCriterion
 * 
 * @property int $id
 * @property string $name
 * @property float $weight
 * 
 * @property Collection|Evaluation[] $evaluations
 *
 * @package App\Models
 */
class EvaluationCriterion extends Model
{
	protected $casts = [
		'weight' => 'float'
	];

	protected $guarded = [];

	public function evaluations()
	{
		return $this->hasMany(Evaluation::class, 'criteria_id');
	}
}
