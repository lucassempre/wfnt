<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Target;
use App\Models\Response;

class ResponseController extends Controller
{
    public function logRequest(Request $request, $header=False)
    {
        if($header)
            return json_encode(array_merge($request->except(''),$request->headers->all()));
        else
            return json_encode($request->all());
    }
    
    public function index(Request $request, $key)
    {
        $target = Target::where('key', $key)->latest()->first();

        if (!$target or !$target->status)
            return view('none');

        if($target->one_to_one  and  $target->responses()->exists())
            return view('none');
        
        if($target->show_by_origin and !($request->headers->get('origin') === $target->origin))
            return view('none');
        
        $url = url($target->key);
        $response = str_replace('{{url}}', $url, $target->body);

        Response::create([
            'ip' => $request->ip(),
            'raw' => self::logRequest($request),
            'target_id' => $target->id,
        ]);
        
        if($target->body_type === "json")
            return response()->json($response, $response ? 200 : 401);
        else
            return view('response', compact('response'));
    }
}
