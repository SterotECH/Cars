<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    #protected $table = 'car';

    #protected $primaryKey = 'id';

    #protected $timestamps = true;

    #protected $dateFormat = 'h:m:s';
    protected $fillable = ['name','founded','description'];

    protected $hidden = ['created_at','updated_at'];
    protected $visible = [];
}
