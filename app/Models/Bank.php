<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'account_type_id',
        'name',
        'icon',
        'balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function setIconAttribute($value)
    {
        $this->attributes['icon'] = strtolower($value);
    }

    public function getIconAttribute($value)
    {
        return strtolower($value);
    }

    public function setBalanceAttribute($value)
    {
        $this->attributes['balance'] = number_format($value, 2);
    }

    public function getBalanceAttribute($value)
    {
        return number_format($value, 2);
    }
}
