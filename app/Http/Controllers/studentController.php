<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;

class studentController extends Controller
{
    //
    public function index(Request $request)
    {
        $input = $request->all();

        if($request->get('search')){
            $items = student::where("name", "LIKE", "%{$request->get('search')}%")
                ->paginate(5);      
        }else{
		  $items = student::paginate(5);
        }

        return response($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
    	$input = $request->all();
        $create = student::create($input);
        return response($create);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $student = student::find($id);
        return response($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
    	$input = $request->all();

        student::where("id",$id)->update($input);
        $student = student::find($id);
        return response($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return student::where('id',$id)->delete();
    }
}
