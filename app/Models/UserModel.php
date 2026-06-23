<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{
    use SoftDeletes;

    protected $table = 'users';       // table di database

    protected $fillable = [               // kolom yang boleh diisi
        'username',
        'password',
    ];

    protected $hidden = [               // kolom yang tidak boleh diakses (misal password)
        'password',
    ];
}
