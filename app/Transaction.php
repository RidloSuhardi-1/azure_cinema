<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id', 'cinema_id', 'broadcast_date', 'broadcast_time', 'price', 'stock',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'transaction_id';

    /**
     * Get the film record associated with the ticket.
     */
    public function film()
    {
        return $this->hasOne('App\Film', 'item_id', 'item_id');
    }
}
