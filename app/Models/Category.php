<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'color',
        'icon',
        'sub_category_of'
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

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }

    public function getNameAttribute($value)
    {
        return $value;
    }

    public function setColorAttribute($value)
    {
        $this->attributes['color'] = strtolower($value);
    }

    public function getColorAttribute($value)
    {
        return strtolower($value);
    }

    public function setIconAttribute($value)
    {
        $this->attributes['icon'] = strtolower($value);
    }

    public function getIconAttribute($value)
    {
        return strtolower($value);
    }

    public function setSubCategoryOfAttribute($value)
    {
        $this->attributes['sub_category_of'] = intval($value);
    }

    public function getSubCategoryOfAttribute($value)
    {
        return intval($value);
    }
}
