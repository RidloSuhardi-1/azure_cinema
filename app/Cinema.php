<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cinema_name', 'location', 'desc', 'image',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'cinema_id';

    /**
     * Get the seats for the cinema
     */

     public function seats()
     {
         return $this->hasMany('App\Seat', 'cinema_id', 'cinema_id');
     }
}
