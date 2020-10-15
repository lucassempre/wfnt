<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Target;

class TargetController extends Controller
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
    public function index(Request $request)
    {
        $sortBy = 'id';
        $orderBy = 'desc';
        $limit = $request->has('limit') ? $request->query('limit') : 5;
        
        $targets = Target::query();

        $targets->when( $request->input('status'), function ($query, $status ) {
            return $query->where('status', $status);
        });
        
        $targets->when( $request->input('search'), function ($query, $search){
            return $query->where(function ($q) use ($search){
                $q
                    ->orWhere('origin', 'like', '%' . $search . '%')
                    ->orWhere('key', 'like', '%' . $search . '%')
                    ->orWhere('target', 'like', '%' . $search . '%');
            });
        });

        $targets = $targets->orderBy($sortBy, $orderBy)->paginate($limit);

        return view('admin.target.index', compact('targets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.target.forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $target = $request->only(['target','origin','body_type', 'body', 'show_by_origin','one_to_one', 'status','key']);
        $target = new Target($target);
        $target->save();

        return redirect()->route('targets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $target = Target::with('responses')->findOrFail($id);

        return view('admin.target.forms.edit', compact('target'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $target = Target::findOrFail($id);
        $target->fill($request->only(['target','origin','body_type', 'body', 'show_by_origin','one_to_one', 'status','key']));
        $target->save();
        return redirect()->route('targets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
