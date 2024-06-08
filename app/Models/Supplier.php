<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone_number',
        'is_active'
    ];
    public function scopeFindByName($query, $name)
    {
        return $query->where('name', 'like', '%' . $name . '%');
    }
    public function scopeFindByEmail($query, $email)
    {
        return $query->where('email', 'like', '%' . $email . '%');
    }
    public function scopeFindByPhoneNumber($query, $phone_number)
    {
        return $query->where('phone_number', 'like', '%' . $phone_number . '%');
    }
    public function scopeFindByAddress($query, $address)
    {
        return $query->where('address', 'like', '%' . $address . '%');
    }
}
