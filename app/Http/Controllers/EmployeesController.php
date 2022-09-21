<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeesRequest;
use App\Models\Companies;
use App\Models\Employees;
use Exception;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this -> validation = new EmployeesRequest();
    }

    public function index()
    {
        try{
            $employees = Employees::paginate(10);
            $companies = Companies::get(['id','name']);
            return view('employees.employees', compact(['employees','companies']));
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator =  $this->validation->storeValidator($request);

        if($validator->fails()){
            return response()->json([
                'message'   => "Error",
                'errors'    => $validator->errors()->toArray(),
                'code'      => 0,
            ]);
        }
      
        $data = [
                'first_name'=> $request->first_name,
                'last_name' => $request->last_name,
                'email'     => $request->email,                   
                'company_id' => $request->company_id,                   
                 'phone'    => $request->phone];

        Employees::create($data);
        return response()->json([
            'message'   => "Employees added successfully",
            'data'      => [],
            'code'      => 1000,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $employees = Employees::where('id',$id)->first();
        if(!empty( $employees )){
            return response()->json([
                'message'   => "Employees loaded successfully",
                'data'      => $employees,
                'code'      => 1000,
            ]);
        }
        return response()->json([
            'message'   => "Data not found",
            'data'      => [],
            'code'      => 1000,
        ]);

    }

    public function update(Request $request, $id)
    {
        //
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
