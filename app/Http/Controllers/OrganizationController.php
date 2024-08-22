<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function storeOrganization(Request $request)
    {
        try {
            $organization = Organization::create($request->validate([
                'name' => 'required|string',
            ]));
        }catch (\Exception $exception){
            return sendErrorResponse('Something went wrong');
        }
        return sendSuccessResponse('Organization created successfully', 200,  $organization);
    }
}
