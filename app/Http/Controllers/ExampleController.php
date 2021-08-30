<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    public function greeting() {

            $infoMsg = array("status"=>"application up and running.");
            return response()->json($infoMsg);
        }
}
