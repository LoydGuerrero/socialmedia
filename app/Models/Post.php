<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Define fillable attributes for mass assignment
    protected $fillable = [
        'user_id',  // Allow mass assignment for user_id
        'content',  // Allow mass assignment for content
    ];

    /**
     * Define the relationship with the User model.
     * Each post belongs to a single user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Additional methods for future functionality can be added here.
     * For example, methods for comments or likes can be defined if needed.
     */
}
