<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logs;
use App\Http\Requests;
use Validator;
use Response;
use Auth;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logsCrud(){
        return view('/logscrud/index');
    }

    public function index()
    {
        $items = Logs::latest()->paginate(5);

        $response = [
            'pagination' => [
                'total' => $items->total(),
                'per_page' => $items->perPage(),
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage(),
                'from' => $items->firstItem(),
                'to' => $items->lastItem()
            ],
            'data' => $items
        ];
        return response()->json($response);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'work_description' => 'required',
            'hours' => 'required'
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $create = Logs::create($data);
        return response()->json($create);
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
        $this->validate($request, [
            'work_description' => 'required',
            'hours' => 'required'
        ]);

        $edit = Logs::find($id)->update($request->all());
        return response()->json($edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Logs::find($id)->delete();
        return response()->json(['done']);
    }
}
