<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompaniesRequest;
use App\Models\Companies;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this -> validation = new CompaniesRequest();
    }
    public function index()
    {
        try{
            $companies = Companies::paginate(10);
            return view('companies.companies', compact(['companies']));

        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator =  $this->validation->storeValidator($request);

        if($validator->fails()){
            return response()->json([
                'message' => "Error",
                'errors' => $validator->errors()->toArray(),
                'code' => 0,
            ]);
        }

        $input['logo'] = time().'.'.$request->logo->extension();
        $request->logo->move(public_path('images'),$input['logo']);
        $data = ['name'=> $request->name,
                'email' => $request->email,                   
                'url' => $request->url,                   
                 'logo' => $input['logo']];
        Companies::create($data);
        return response()->json([
            'message' => "Company added successfully",
            'data' => [],
            'code' => 1000,
        ]);
    }

    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Companies::where('id',$id)->first();
        return response()->json([
            'message' => "Company loaded successfully",
            'data' => $companies,
            'code' => 1000,
        ]);

    }

    public function update(Request $request, $id)
    {
        dd($request->edit_name);
        // $request
        $companies = Companies::where('id',$id)->first();
        if(!empty($companies))
        {
            $input['edit_logo'] = "";
            if(isset($request->edit_logo)){
                $input['edit_logo'] = time().'.'.$request->edit_logo->extension();
                $request->edit_logo->move(public_path('images'),$input['edit_logo']);
            }
          

            Companies::where('id',$id)->update([
                'name'=> $request->edit_name,
                'email' => $request->edit_email,                   
                'website' => $request->edit_url,                   
                 'logo' => $input['edit_logo']
            ]);
        }
    }


    public function destroy($id)
    {
        $res=Companies::where('id',$id)->delete();
        return response()->json([
            'message' => "Company deleted successfully",
            'data' => [],
            'code' => 1000,
        ]);
    }
}
