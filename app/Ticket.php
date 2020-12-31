<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
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
    protected $primaryKey = 'ticket_id';

    /**
     * Get the cinema record associated with the ticket.
     */
    public function cinema()
    {
        return $this->hasOne('App\Cinema', 'cinema_id', 'cinema_id');
    }

    public function film()
    {
        return $this->belongsTo('App\Film', 'item_id', 'item_id');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Transaction', 'ticket_id', 'ticket_id');
    }

}
