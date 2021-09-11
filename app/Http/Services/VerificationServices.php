<?php


namespace App\Http\Services;


use App\Models\CodeVerification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VerificationServices
{
    /**
     * set code
     * @param $data
     * @return mixed
     */
    public function setVerificationCode($data){
        $code = mt_rand(100000, 999999);
        $data['code'] = $code;
        CodeVerification::whereNotNull('user_id')->where(['user_id' => $data['user_id']])->delete();
        return CodeVerification::create($data);
    }

    /**
     * sms message
     * @param $code
     * @return string
     */
    public function getSMSVerifyMessageByAppName($code){
            $message= ' is your verification code for your AXA your health account';
            return $code.$message;
    }

    /**
     * check code
     * @param $code
     * @return bool
     */
    public function checkOTPCode ($code){
        if (Auth::guard()->check()){
            $verificationData = CodeVerification::where('user_id',Auth::id())->first();
            if($verificationData -> code == $code )
            {
                User::where('id',Auth::id())->update(['mobile_verified_at'=>now()]);
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

    /**
     * remove code
     * @param $code
     */
    public function removeOTPCode($code){
        CodeVerification::where('code',$code)->delete();
    }
}
