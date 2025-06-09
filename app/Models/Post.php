<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin \Eloquent
 */
class Post extends Model {
    use HasFactory, SoftDeletes;

    public function visitors() {
        return $this->belongsToMany(Visitor::class, 'post_visitor')->withTimestamps();
    }
}
