<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Target;
use App\Models\Response;

class TargetResponseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $targetId)
    {
        $sortBy = 'id';
        $orderBy = 'desc';
        $limit = $request->has('limit') ? $request->query('limit') : 5;
        
        $responses = Response::query()->where('target_id', $targetId);
        
        $responses->when( $request->input('search'), function ($query, $search){
            return $query->where(function ($q) use ($search){
                $q
                    ->orWhere('ip', 'like', '%' . $search . '%')
                    ->orWhere('raw', 'like', '%' . $search . '%');
            });
        });

        $responses = $responses->orderBy($sortBy, $orderBy)->paginate($limit);

        return view('admin.target.response', compact('responses'));
    }

}
