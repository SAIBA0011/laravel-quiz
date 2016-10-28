<?php

namespace App;

use App\Models\QuizResults;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = [
        'password', 'remember_token'
    ];

	public function attempts()
	{
		return $this->belongsTo(Attempt::class);
	}

    public function quiz_results()
    {
        return $this->hasMany(QuizResults::class);
	}

	// To be implemented, this is for the frontend to check if a user passed a certian quiz.
    public function checkQuizPassedStatus($quiz)
    {

    }

}