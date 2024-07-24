<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    use HasFactory;

    const USER_ROLE = 1;
    const AUTHOR_ROLE = 2;
    const SITE_ADMIN_ROLE = 3;
}
