<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Services\SMSGateways\VictoryLinkSms;
use App\Http\Services\VerificationServices;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::VERIFIED;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $verification_service;
    public function __construct(VerificationServices $verification_service)
    {
        $this->middleware('guest');
        $this->verification_service=$verification_service;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        try{
            DB::beginTransaction();
            $verification=[];
        $user=User::create([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ]);
        $verification['user_id']=$user->id;
        $verification_data = $this->verification_service->setVerificationCode($verification);
        $message = $this->verification_service->getSMSVerifyMessageByAppName($verification_data->code);
        #app(VictoryLinkSms::class)->sendSms($user->mobile,$message);
        DB::commit();
        return $user;
        }catch(\Exception $ex){
            DB::rollback();
        }
    }
}
