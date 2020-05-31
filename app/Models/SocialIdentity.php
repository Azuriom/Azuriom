<?php

namespace Azuriom\Models;

use Azuriom\Models\User;
use Illuminate\Database\Eloquent\Model;

//https://www.twilio.com/blog/add-facebook-twitter-github-login-laravel-socialite
class SocialIdentity extends Model
{
    protected $fillable = ['user_id', 'provider_name', 'provider_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
