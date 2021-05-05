<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;

class SocialIdentity extends Model
{
    protected $fillable = ['user_id', 'provider_name', 'provider_id', 'data']; //https://www.twilio.com/blog/add-facebook-twitter-github-login-laravel-socialite

    protected $casts = [
        'data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
