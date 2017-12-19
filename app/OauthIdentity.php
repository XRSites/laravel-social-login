<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OauthIdentity extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider', 'provider_user_id', 'access_token', 'refresh_token'
    ];
}
