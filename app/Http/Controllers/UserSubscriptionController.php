<?php

namespace App\Http\Controllers;

use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UserSubscriptionController extends Controller
{
    /**
     * function to done user subscription for the website
     */
    public function subscribeUser(Request $request)
    {
        // Validating the user request data
        $validator = Validator::make($request->all(), [
            'website_id' => 'required|exists:websites,id',
            'email' => [
                'bail',
                'required',
                'email',
                Rule::unique('user_subscriptions')->where(function ($query) use($request) {
                    return $query->where('website_id', $request->website_id);
                })
            ]
        ]);

        if ($validator->fails()) {
            return [
                'type' => 'error',
                'message'   => 'Validation errors',
                'data' => $validator->errors()
            ];
        }
        UserSubscription::create($request->all());

        return [
            'type' => 'success',
            'message' => 'You are subscribed for this website successfully.'
        ];
    }
}
