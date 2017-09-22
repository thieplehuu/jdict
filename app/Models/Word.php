<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'words';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'word', 'furigana', 'related'];

    public function categories()
    {
    	return $this->belongsToMany('App\Models\Category')->withTimestamps();;
    }

    public function getCategoryListAttribute()
    {
    	return $this->categories->pluck('id')->toArray();
    }
    
    /**
     * Get the mean for the blog post.
     */
    public function means()
    {
    	return $this->hasMany('App\Models\Meaning');
    }    
    
}
