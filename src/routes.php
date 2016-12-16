<?php

class Pic extends Illuminate\Database\Eloquent\Model {

    protected $table = 'pic';
    protected $fillable = ['id', 'deviceid', 'date', 'url', 'latitude', 'longitude', 'positive', 'negative', 'warning', 'file'];
    public $timestamps = false; //Dehabilita
}
class Twins extends Illuminate\Database\Eloquent\Model {

    protected $table = 'twins';
    protected $fillable = ['id1', 'id2'];
    public $timestamps = false; //Dehabilita
}

$app->post('/json/createtwin', function($request, $response, $args){
    //Obtener datos del body
    $body = $request->getBody();
    $data = json_decode($body,true);
    //Creacion de un nuevo pic
    $pic  = new Pic;
    //obtencion de parametros
    $deviceid = $data['deviceId'];
    $date =  $data['date'];
    $url =   $data['url'];
    $latitude =  $data['latitude'];
    $longitude =  $data['longitude'];
//    $positive = $args{'positive'};
//    $negative = $args{'negative'};
//    $warning = $args{'warning'};
    $file =  $data['file'];
    //asignacion de parametros
    $pic->deviceid = $deviceid;
    $pic->date = $date;
    $pic->url = $url;
    $pic->latitude = $latitude;
    $pic->longitude = $longitude;
//    $pic->positive = $positive;
//    $pic->negative = $negative;
//    $pic->warning = $warning;
    $pic->file = $file;
    //guardar tabla en base de datos
    $pic->save();
    //obtener otra imagen de la base datos no relacionada con el deviceid
    $pic2 = Pic::where('deviceid','!=',$deviceid)->firstOrFail();
    //crear twins
    $twins = new Twins;
    $twins->id1 = $pic->id;
    $twins->id2 = $pic2->id;
    $twins->save();

    return $response->withJson($pic2->toArray());
});
$app->post('/test', function($request, $response, $args){
    $body = $request->getBody();
    $data = json_decode($body,true);
    //Creacion de un nuevo pic
    $pic  = new Pic;
    //obtencion de parametros
    //$deviceid = ;
    //asignacion de parametros
    $pic->deviceid = $data['deviceId'];
    //guardar tabla en base de datos
    $pic->save();
    return $response->withJson($pic->toArray());
});
$app->post('/test2', function($request, $response, $args){
    $body = file_get_contents('php://input');
    $data = json_decode($body,true);
    //Creacion de un nuevo pic
    $pic  = new Pic;
    //obtencion de parametros
    //$deviceid = ;
    //asignacion de parametros
    $pic->deviceid = $data['deviceid'];
    //guardar tabla en base de datos
    $pic->save();
    return $response->withJson($pic->toArray());
});