<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ActivationController;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
//    protected $redirectTo = '/home';
//  activation controller construct property
    protected $activate;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivationController $activationController)
    {
        $this->middleware('guest');
        $this->activate = $activationController;
    }

    // register with confirmation mail send
    public function register(Request $request)
    {
        $validate = $this->validator($request->all());
        if ($validate->fails())
            return $this->throwValidationException($request, $validate);

        $userCreate = $this->create($request->all());
        $user['email'] = $userCreate->email;
        $user['first_name'] = $userCreate->email;
        $sendMail = $this->activate->sendActivationMail($userCreate->id,$user);
        auth()->logout();
        if ($sendMail == true)
            return redirect('/login')->with('success','We send a email to activate account');
        return back()->with('warning','some error happened');
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
            'firstName' => 'required|max:50',
            'lastName'  => 'required|max:50',
            'email'     => 'required|email|max:100|unique:users',
            'password'  => 'required|min:6|confirmed',
            'phone'     => 'required|max:15',
            'policy'    => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name'=> $data['firstName'],
            'last_name' => $data['lastName'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
            'phone'     => $data['phone'],
        ]);
    }
}
