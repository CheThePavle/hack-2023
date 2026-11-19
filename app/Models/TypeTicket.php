<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTicket extends Model
{
    use HasFactory;

    protected $table = 'type_ticket';
    protected $primaryKey = 'id_type_ticket';
    public $timestamps = false;

    protected $fillable = [
        'id_event',
        'name_type_ticket',
        'price_type_ticket',
        'size_type_ticket',
        'url_type_ticket',
    ];
}
