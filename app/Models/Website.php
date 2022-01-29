<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    
    protected $fillable = ['website_title', 'website_url'];

    /**
     * The posts that belong to the website.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
