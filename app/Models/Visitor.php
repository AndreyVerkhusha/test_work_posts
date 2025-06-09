<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @mixin \Eloquent
 */

class Visitor extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id'];

    public function posts() {
        return $this->belongsToMany(Post::class, 'post_visitor')->withTimestamps();
    }
}
