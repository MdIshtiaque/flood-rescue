<?php

namespace App\Http\Controllers;

use App\Models\IWantToHelp;
use Illuminate\Http\Request;

class IWantToHelpController extends Controller
{
    public function getAllWantToHelp()
    {
        return sendSuccessResponse(IWantToHelp::orderBy('id', 'desc')->paginate(10));
    }

    public function storeWantToHelp(Request $request)
    {
        try {
            return sendSuccessResponse('success', 200, $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'location' => 'required',
                'lat' => 'nullable',
                'lng' => 'nullable',
                'help_with' => 'required',
            ]));
        }catch (\Exception $exception){
            return sendErrorResponse('something went wrong');
        }
    }
}
