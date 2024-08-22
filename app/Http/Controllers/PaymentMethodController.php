<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function getAllPaymentMethods()
    {
        return sendSuccessResponse('success', 200,
            PaymentMethod::select(
                'payment_methods.id',
                'payment_methods.payment_method as payment_method_name',
                'organizations.name as organization_name',
            )
                ->leftJoin('organizations', 'organizations.id', '=', 'payment_methods.organization_id')
                ->orderBy('id', 'desc')
                ->paginate(10));
    }

}
