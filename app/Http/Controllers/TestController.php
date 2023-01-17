<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabin;

class TestController extends Controller
{
    public function changeStatus(Request $request){

        $cabin = Cabin::find($request->id);
        $cabin->status = $request->status;
        $cabin->save();
        
    }
}
