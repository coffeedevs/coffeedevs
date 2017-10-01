<?php

Route::any('redirect-ipn',function(\Illuminate\Http\Request $request){
    $client = new GuzzleHttp\Client();

    try {
        $res = $client->post(env('REDIRECT_IPN', ''), [
            'query' => $request->all()
        ]);
    }
    catch(Exception $exception){}
    return new \Illuminate\Http\Response('',200);
});