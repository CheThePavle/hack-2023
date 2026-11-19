<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $table = 'user_permission';
    protected $primaryKey = 'id_user_permission';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_permission',
    ];

    public function permission() {
        return $this->belongsTo(Permission::class, 'id_permission', 'id_permission');
    }
}
