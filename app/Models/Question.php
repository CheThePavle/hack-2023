<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question  extends Model
{
    use HasFactory;

    protected $table = 'question';
    protected $primaryKey = 'id_question';
    public $timestamps = false;

    protected $fillable = [
        'id_event',
        'id_user',
        'name_question',
        'reply_question',
        'date_question',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
