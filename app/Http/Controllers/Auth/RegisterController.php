<?php

namespace App\Http\Controllers\Auth;

use App\Mail\RegisterMail;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Notifications\RegisterNotification;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
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
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function register()
    {
        return view('Register');

    }

    public function postRegister(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->get('Username'),
            'email' => $request->get('Email'),
            'password' => bcrypt($request->get('Password')),
            'approve_id' => str_random(40) . time()
        ]);

        $user->notify(new RegisterNotification($user));

        return redirect()->route('approve', $user->approve_id);

    }

    public function verifyUser($approveId)
    {
        $user = User::where('approve_id', $approveId)->first();

        if (!$user) {
            return 'your link has been expired or used.';
        }

        $user->fill([
            'approve_id' => null,
            'is_approve' => true
        ])->save();

        session()->flash('success', 'User Is Approved Successfully');

        return redirect()->route('register');
    }
}
