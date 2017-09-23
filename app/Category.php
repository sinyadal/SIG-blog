<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; // This is optional - if the table name not following the specific convention

    public function posts()
    {
    	return $this->hasmany('App\Post');
    }
}
