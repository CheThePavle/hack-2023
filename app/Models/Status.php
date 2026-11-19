<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';
    protected $primaryKey = 'id_status';
    public $timestamps = false;

    protected $fillable = [
        'name_status',
        'code_status',
    ];

    static public function getIdByCode($code) {
        $status = Status::where('code_status', $code)->first('id_status');
        return $status->id_status;
    }
}
