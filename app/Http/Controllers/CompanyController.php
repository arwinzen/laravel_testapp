<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use DB;

class CompanyController extends Controller
{
    //
    public function index(){
        $address = "Invoke Address";
        $companies = Company::get();
        $companies = Company::paginate(10);
//        dd($companies);

        return view('companies',
            ["address" => $address],
            ["companies" => $companies]
        );

//        return view('companies',
//        compact($address, $companies));
    }

    public function edit(Request $request){

//        $company = Company::where("id", $request->id)->first();

        // DB::enableQueryLog();
        $company = Company::whereId($request->id)->first();
        // dd(DB::getQueryLog());
        $status = "";

        if(isset($request->name)){
            $company->name = $request->name;
            $company->save();
            $status = "Record $company->id updated";
            return redirect('company/edit/' . $company->id)
                   ->with('status', $status);
        }

        return view('company.edit', [
            "company" => $company
            ]
        )->with("status", $status);


        // id = path parameter
        // return $request->id;
        // id2 = query parameter
        // return $request->id2;

    }
}
