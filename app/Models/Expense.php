<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'bank_id',
        'status_id',
        'payment_id',
        'description',
        'amount',
        'due_date',
        'notes',
        'repeat'
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = ucwords($value);
    }

    public function getDescriptionAttribute($value)
    {
        return ucwords($value);
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = number_format($value, 2);
    }

    public function getAmountAttribute($value)
    {
        return number_format($value, 2);
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = date('Y-m-d', strtotime($value));
    }

    public function getDueDateAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }

    public function setNotesAttribute($value)
    {
        $this->attributes['notes'] = ucwords($value);
    }

    public function getNotesAttribute($value)
    {
        return ucwords($value);
    }

    public function setRepeatAttribute($value)
    {
        $this->attributes['repeat'] = boolval($value);
    }

    public function getRepeatAttribute($value)
    {
        return boolval($value);
    }
}
