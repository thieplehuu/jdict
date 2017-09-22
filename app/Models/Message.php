<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'messages';
	
	/**
	 * The database primary key value.
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';
	
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
}
