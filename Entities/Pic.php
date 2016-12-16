<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 14-12-2016
 * Time: 11:31
 */

namespace App\Entities;

use Illuminate;


class Pic extends Illuminate\Database\Eloquent\Model {

    protected $table = 'pic';
    protected $fillable = ['id', 'deviceid', 'date', 'url', 'latitude', 'longitude', 'positive', 'negative', 'warning'];
    public $timestamps = false; //Elimina autoincrement
}