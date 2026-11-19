<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $fillable = [
        'id_role',
        'last_name',
        'name',
        'patronymic',
        'phone',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    private $permission = [];

    static public function getByEmail($email) {
        $user = User::where('email', $email)->with('role')->first();
        return $user;
    }

    public function permissions() {
        $userPermissions = UserPermission::where('id_user', $this->id_user)->with('permission')->get();
        $permissions = [];
        foreach ($userPermissions as $item) {
            $permissions[] = $item['permission']['code_permission'];
        }
        return $permissions;
    }

    public function role() {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    public function checkOrganizer() {
        $idRoleByCode = Role::getIdByCode('ORGANIZER');
        return $this->id_role === $idRoleByCode ? true : false;
    }

    public function checkAdmin() {
        $idRoleByCode = Role::getIdByCode('ADMIN');
        return $this->id_role === $idRoleByCode ? true : false;
    }

    public function checkOperator() {
        $idRoleByCode = Role::getIdByCode('OPERATOR');
        return $this->id_role === $idRoleByCode ? true : false;
    }
}
