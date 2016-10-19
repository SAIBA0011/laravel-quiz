<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model {

	protected $table = 'users';
	public $timestamps = true;
    protected $guarded = [];

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function attempts()
	{
		return $this->belongsTo(Attempt::class);
	}

}