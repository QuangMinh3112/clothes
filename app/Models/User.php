<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'is_active',
        'phone_number',
        'is_admin',
        'is_banned',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function scopeFindByName($query, $name)
    {
        return $query->where('name', 'like', '%' . $name . '%');
    }
    public function scopeFindByEmail($query, $email)
    {
        return $query->where('email', 'like', '%' . $email . '%');
    }
    public function scopeFindByMinAge($query, $minAge)
    {
        return $query->where('age', '>=', $minAge);
    }
    public function scopeFindByMaxAge($query, $maxAge)
    {
        return $query->where('age', '<=', $maxAge);
    }
    public function scopeFindByAge($query, $minAge, $maxAge)
    {
        if (!empty($minAge)) {
            return $query->where('age', '>=', $minAge);
        }
        if (!empty($maxAge)) {
            return $query->where('age', '<=', $maxAge);
        }
    }
}
