<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;

use App\Services\SearchService;
use Illuminate\Http\Request;

class CompanyStackController extends Controller
{

    public function index(Request $req, Company $company)
    {

        $companies  = $company::paginate(10);

        // if the user enters a search term,  handle search logic
        if ($req->has('item')) {

            return (new SearchService($req->item, $company))->search();

            // if none, just list all results 
        } elseif (count($companies) > 0) {
            return CompanyResource::collection($companies); // 

        }
    }

    // retrieving details about a particular stack 
    public function show($id)
    {
        $company = new Company();

        $companyStack = $company->where('id', $id)->first();

        if ($companyStack) {

            return response()->json(['company_details' =>  $companyStack]);
        } else {

            return response()->json(['message' => 'No  details for this company yet  '], 404);
        }
    }


    public function store()
    {
        
    }
}
