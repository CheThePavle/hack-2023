<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';
    protected $primaryKey = 'id_event';
    public $timestamps = false;

    protected $fillable = [
        'id_status',
        'id_category',
        'id_user',
        'name_event',
        'address_event',
        'description_event',
        'beg_date_event',
        'end_date_event',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'id_category', 'id_category');
    }

    public function status() {
        return $this->belongsTo(Status::class, 'id_status', 'id_status');
    }

    public function organizer() {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
