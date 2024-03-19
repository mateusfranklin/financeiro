<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'period',
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

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function setPeriodAttribute($value)
    {
        $this->attributes['period'] = date('Y-m-d', strtotime($value));
    }

    public function getPeriodAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }
}
