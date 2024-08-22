<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolunteerRequest;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function getAllVolunteers()
    {
        return sendSuccessResponse('success', 200, Volunteer::orderBy('id', 'DESC')->paginate(10));
    }

    public function storeVolunteer(VolunteerRequest $request)
    {
        try {
            return sendSuccessResponse('success', 200, Volunteer::create($request->validated()));
        } catch (\Exception $exception) {
            return sendErrorResponse('something went wrong');
        }
    }

    public function updateVolunteer(VolunteerRequest $request, Volunteer $volunteer)
    {
        try {
            return sendSuccessResponse('success', 200, $volunteer->update($request->validated()));
        } catch (\Exception $exception) {
            return sendErrorResponse('something went wrong');
        }
    }

    public function deleteVolunteer(Volunteer $volunteer)
    {
        return sendSuccessResponse('success', 200, $volunteer->delete());
    }
}
