<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Submission
 * 
 * @property int $id
 * @property string $fullname
 * @property Carbon $birthday
 * @property string $nationality
 * @property string $country
 * @property string $email
 * @property string $phone
 * @property string $occupation
 * @property string|null $organization
 * @property string|null $personnal_website
 * @property int|null $team_count
 * @property string|null $organization_presentation
 * @property string $leadership_experience
 * @property string $realisations
 * @property string $community_impact
 * @property string $leadership_challenge
 * @property string $contribution
 * @property string $expected_from_adinkra
 * @property string|null $leadership_award
 * @property string $biography
 * @property string $motivation_video
 * @property string|null $others_video_link
 * @property string|null $status
 * @property int|null $assigned_to
 * @property Carbon|null $evaluation_deadline
 * @property Carbon|null $submit_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User|null $user
 * @property Collection|Evaluation[] $evaluations
 *
 * @package App\Models
 */
class Submission extends Model
{
	use SoftDeletes;

	protected $casts = [
		'team_count' => 'int',
		'assigned_to' => 'int',
		'evaluation_deadline' => 'datetime',
		'submit_at' => 'datetime'
	];

	protected $guarded = [];

	public function user()
	{
		return $this->belongsTo(User::class, 'assigned_to');
	}

	public function evaluations()
	{
		return $this->hasMany(Evaluation::class);
	}
}
