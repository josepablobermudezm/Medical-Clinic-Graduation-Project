<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_exmcardiovasculares extends Model
{
  protected $primaryKey = 'car_id';
  protected $fillable = ['car_examenClinico','car_detalle', 'car_tipo'];
  protected $dates = ['created_at', 'updated_at'];

}
