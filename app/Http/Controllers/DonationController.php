<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonationRequest;
use App\Models\Donation;
use Illuminate\Http\JsonResponse;

class DonationController extends Controller
{
    public function getAllDonation(): JsonResponse
    {
        return sendSuccessResponse('success', 200,
            Donation::select(
                'donations.id',
                'donations.name as donation_name',
                'organizations.name as organization_name',
                'donations.amount',
            )
                ->leftJoin('organizations', 'organizations.id', '=', 'donations.organization_id')
                ->orderBy('id', 'desc')
                ->paginate(10));
    }

    public function getDonation(Donation $donation): JsonResponse
    {
        return sendSuccessResponse('success', 200, $donation->select(
            'donations.id',
            'donations.name as donation_name',
            'organizations.name as organization_name',
            'donations.amount',
        )
            ->leftJoin('organizations', 'organizations.id', '=', 'donations.organization_id')
            ->first());
    }

    public function storeDonation(DonationRequest $request): JsonResponse
    {
        try {
            $donation = Donation::create($request->validated());
        }catch (\Exception $exception) {
            return sendErrorResponse('something went wrong');
        }
        return sendSuccessResponse('success',200,  $donation);
    }

    public function updateDonation(DonationRequest $request, Donation $donation)
    {
        try {
            $donation = $donation->update($request->validated());
        }catch (\Exception $exception) {
            return sendErrorResponse('something went wrong');
        }
        return sendSuccessResponse('success', 200,  $donation);
    }

    public function deleteDonation(Donation $donation): JsonResponse
    {
        $donation->delete();
        return sendSuccessResponse('success');
    }

}
