<?php
/**
 * This is the User model class, which represents a user in Laravel application.
 */

namespace App\Models;

use Carbon\Carbon; // For handling date and time values
use Illuminate\Database\Eloquent\Collection; // For working with collections of models
use Illuminate\Foundation\Auth\User as Authenticatable; // Base class for user authentication
use Illuminate\Notifications\Notifiable; // Provides notifications functionality
use Laravel\Sanctum\HasApiTokens; // Provides API token functionality
use Illuminate\Database\Eloquent\Factories\HasFactory; // For working with model factories

class User extends Authenticatable
{

    /**
     * @var string The username Name of the main site admin user account
     */
    const SITE_ADMIN_NAME = "Site Admin";

    /**
     * @var string The username email address of the main site admin user account
     */
    const SITE_ADMIN_EMAIL = "admin@taste.co.uk";

    use HasApiTokens, HasFactory, Notifiable; // Add traits to the model

    protected $table = 'users'; // Name of the database table associated with this model

    protected $dates = [ // List of attributes that should be cast to dates
        'email_verified_at'
    ];

    protected $hidden = [ // List of attributes that should be hidden from array and JSON output
        'password',
        'remember_token'
    ];

    protected $fillable = [ // List of attributes that are mass assignable
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'roles_id'
    ];

    /**
     * Get the author associated with the user.
     */
    public function author()
    {
        return $this->hasOne(Author::class);
    }

    /**
     * Get the role associated with the user.
     */
    public function role()
    {
        return $this->hasOne(Role::class);
    }
}
