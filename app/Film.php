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
        'item_name', 'genre', 'image', 'desc', 'time', 'trailer', 'label',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'item_id';

    /**
     * Get the ticket record associated with the ticket.
     */
    public function ticket()
    {
        return $this->hasOne('App\Ticket', 'item_id', 'item_id');
    }
}
