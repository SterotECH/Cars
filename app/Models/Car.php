<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    #protected $timestamps = true;

    #protected $dateFormat = 'h:m:s';
    protected $fillable = ['name','founded','description'];

    protected $hidden = ['created_at','updated_at
    '];
    protected $visible = [];

    public function carMode(){
        return $this->hasMany(CarModel::class);
    }

    //Define a has through relationship
    public function engines()
    {
        return $this->hasManyThrough(
            Engine::class,
            CarModel::class,
            'car_id', //Foreign key on CarModel tables
            'model_id' //Foreign key on Engine tables
         );
    }

    // Define has one through relationship
    public function productionDate()
    {
        return $this->hasOneThrough(CarProductionDate::class,
        CarModel::class,
        'car_id',
        'model_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
