<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'id_role';
    public $timestamps = false;

    protected $fillable = [
        'name_role',
        'code_role',
    ];

    static public function getIdByCode($code) {
        $role = Role::where('code_role', $code)->first('id_role');
        return $role->id_role;
    }

//    public function users()
//    {
//        return $this->hasMany(User::class, 'id_role', 'id_role');
//    }
}
