<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'ticket';
    protected $primaryKey = 'id_ticket';
    public $timestamps = false;

    protected $fillable = [
        'id_type_ticket',
        'id_user',
        'code_ticket',
        'date_ticket',
    ];
}
