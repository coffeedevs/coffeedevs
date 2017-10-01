<?php

Route::any('redirect-ipn',function(\Illuminate\Http\Request $request){
    $client = new GuzzleHttp\Client();

    $res = $client->post(env('REDIRECT_IPN',''), [
        'query' => $request->all()
    ]);

    return new \Illuminate\Http\Response($res->getBody()->getContents(),$res->getStatusCode());
});