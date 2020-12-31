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
        'customer_id', 'ticket_id', 'seat_id', 'qty', 'price_per_item', 'total_price', 'valid_until',
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

    public function member()
    {
        return $this->hasOne('App\Member', 'id', 'customer_id');
    }

    public function film()
    {
        return $this->hasOne('App\Film', 'item_id', 'item_id');
    }

    public function ticket()
    {
        return $this->hasOne('App\Ticket', 'ticket_id', 'ticket_id');
    }

    public function seat()
    {
        return $this->hasOne('App\Seat', 'seat_id', 'seat_id');
    }
}
