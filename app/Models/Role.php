<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'color'
    ];

    public function getHexColor()
    {
        return "#{$this->color}";
    }

    public function getBadgeStyle()
    {
        $color = color_contrast($this->getHexColor());

        return "color: {$color}; background: {$this->getHexColor()}";
    }

    public function isPermanent()
    {
        return $this->id == 1 || $this->id == 2;
    }

    public function isDefault()
    {
        return $this->id == 1;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the default role
     *
     * @return Role
     */
    public static function defaultRole()
    {
        return Role::find(1);
    }
}
