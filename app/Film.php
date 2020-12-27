<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_name', 'genre', 'image', 'desc', 'label',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'item_id';
}
