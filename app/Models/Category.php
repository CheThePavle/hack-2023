<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $primaryKey = 'id_category';
    public $timestamps = false;

    protected $fillable = [
        'name_category',
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'id_category', 'id_category')
            ->where('id_status', Status::getIdByCode('PUBLISHED'))
            ->where('beg_date_event', '>', Carbon::now());
    }
}
