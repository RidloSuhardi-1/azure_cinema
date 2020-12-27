<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seat_name', 'cinema_id',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'seat_id';

    /**
     * Get the cinema that owns the seat.
     */
    public function cinema()
    {
        return $this->belongsTo('App\Cinema');
    }
}
