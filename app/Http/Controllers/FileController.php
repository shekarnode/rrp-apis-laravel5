<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class FileController extends Controller
{
    public function uploadFile(Request $request) {
        try {
            $filename = $request->file('file')->store('', 'google');
            $storage = \Storage::disk("google");
            $details = $storage->getMetadata($filename);
            $url = array("url"=>$storage->url($filename));
            $status = "success";
            $responseMsg = "file uploaded Successfully";
            return self::responseBuilder($status,$responseMsg,$url);
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    public static function responseBuilder($status,$responseMsg,$response){
        $responseArray = [
            "status" => $status,
            "responseMsg" => $responseMsg,
            "response" => $response
        ];
        return json_encode($responseArray);
    }
}
