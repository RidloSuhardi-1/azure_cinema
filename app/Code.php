<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code_name', 'code', 'value', 'customer_type', 'expired',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'code_id';
}
