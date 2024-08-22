<?php

namespace App\Http\Controllers;

use App\Http\Requests\RQHelpRequest;
use App\Models\RequestForHelp;
use Illuminate\Http\Request;

class RequestForHelpController extends Controller
{
    public function getAllRequestForHelp()
    {
        return sendSuccessResponse('success', 200,  RequestForHelp::orderBy('id', 'desc')->paginate(10));
    }

    public function storeRequestForHelp(RQHelpRequest $request)
    {
        try {
            $rqHelp = RequestForHelp::create($request->validated());
        }catch (\Exception $exception){
            return sendErrorResponse('something went wrong');
        }
        return sendSuccessResponse('success', 200, $rqHelp);
    }

    public function updateRequestForHelp(RQHelpRequest $request,RequestForHelp $requestForHelp)
    {
        try {
            return sendSuccessResponse('success', 200, $requestForHelp->update($request->validate()));
        }catch (\Exception $exception){
            return sendErrorResponse('something went wrong');
        }
    }

    public function deleteRequestForHelp(RequestForHelp $requestForHelp)
    {
        return sendSuccessResponse('success', 200, $requestForHelp->delete());
    }
}
