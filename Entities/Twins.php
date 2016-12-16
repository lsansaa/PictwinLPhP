<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 14-12-2016
 * Time: 11:45
 */

namespace App;

use Illuminate;
class Twins extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'twins';
    protected $fillable = ['id1','id2'];
    public $timestamps = false; //Elimina autoincrement
}