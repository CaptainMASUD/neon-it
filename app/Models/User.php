<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public const ROLE_USER = 'user';
    public const ROLE_ADMIN = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /*
    |--------------------------------------------------------------------------
    | User Package Requests
    |--------------------------------------------------------------------------
    | This relationship makes sure we can load only this user's package requests.
    */
    public function packageRequests()
    {
        return $this->hasMany(PackageRequest::class);
    }

    public function activePackageRequests()
    {
        return $this->hasMany(PackageRequest::class)
            ->where('status', PackageRequest::STATUS_ACTIVE);
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isUser(): bool
    {
        return $this->role === self::ROLE_USER;
    }
}