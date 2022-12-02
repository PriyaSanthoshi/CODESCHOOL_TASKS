<?php

$response = [
    'status'=>false,
    'message'=>'',
    'data'=>null
];

function returnFailedResponse($msg = null) {
    return json_encode([
        'status'=>false,
        'message'=>$msg,
        'data'=>null,
    ]);
}

function returnSuccessResponse($msg = null, $data = null) {
    return json_encode([
        'status'=>true,
        'message'=>$msg,
        'data'=>$data
    ]);
}
// function