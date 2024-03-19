<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank_id',
        'status_id',
        'account_type_id',
        'name',
        'icon',
        'credit_limit',
        'due_date',
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

    public function bank()
    {
        return $this->belongsTo(Bank::class);
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

    public function setCreditLimitAttribute($value)
    {
        $this->attributes['credit_limit'] = floatval($value);
    }

    public function getCreditLimitAttribute($value)
    {
        return floatval($value);
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = date('Y-m-d', strtotime($value));
    }

    public function getDueDateAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }
}
