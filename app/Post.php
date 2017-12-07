<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id','title','featured','category_id','content','slug'];
    protected $dates = ['deleted_at'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
