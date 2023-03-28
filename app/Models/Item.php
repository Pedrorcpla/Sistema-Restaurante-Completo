<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;

    protected $table = 'item';

    protected $fillable = [
        'id',
        'name',
        'ingredients',
        'price',
        'tag',
        'image_path',
        'image_name',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
