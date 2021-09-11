<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\VerificationRequest;
use App\Http\Services\VerificationServices;

class VerificationCodeController extends Controller
{
    public $verification_service;
    public function __construct(VerificationServices $verification_service)
    {
        $this->verification_service=$verification_service;
    }

    public function getVerify(){
        return view('auth.verification');
    }

    /**
     * check verification code
     * @param VerificationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(VerificationRequest $request)
    {
        $check = $this->verification_service->checkOTPCode($request->code);
        if(!$check) {
            return redirect()->route('verify_page')->withErrors(['code' => __('site/auth.verify_error')]);
        }else {
            $this->verification_service->removeOTPCode($request->code);
            return redirect()->route('home');
        }
    }
}
