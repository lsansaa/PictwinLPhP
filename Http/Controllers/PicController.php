<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 14-12-2016
 * Time: 11:51
 */

namespace App\Http\Controllers;

use App;

class PicController
{

    public function __construct()
    {

    }
    public function createTwins($args){
        Pic::insert([
            ['deviceid'=>0]
        ]);
    }
}