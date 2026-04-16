<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'   => ['required', 'string', 'min:3'],
            'last_name'    => ['required', 'string', 'min:3'],
            'middle_name'  => ['nullable', 'string'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username'     => ['nullable', 'string'],
            'phone_number' => ['required', 'digits:10', 'unique:users'],
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
        ], [

            // First Name
            'first_name.required' => 'First name is required.',
            'first_name.min'      => 'First name must be at least 3 characters.',

            // Last Name
            'last_name.required' => 'Last name is required.',
            'last_name.min'      => 'Last name must be at least 3 characters.',

            // Email
            'email.required' => 'Email address is required.',
            'email.email'    => 'Please enter a valid email address.',
            'email.unique'   => 'This email is already registered.',

            // Phone
            'phone_number.required' => 'Mobile number is required.',
            'phone_number.digits'   => 'Mobile number must be exactly 10 digits.',
            'phone_number.unique'   => 'This Mobile number is already in use.',

            // Password
            'password.required'  => 'Password is required.',
            'password.min'       => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',

        ]);
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        event(new Registered($user));

        // $this->guard()->login($user);

        return redirect()->route('login')->with('success', 'Registration successful! Please verify your email before login.');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'first_name'   => $data['first_name'],
            'last_name'    => $data['last_name'],
            'middle_name'  => $data['middle_name'] ?? null,
            'username'     => $data['username'] ?? null,
            'role'         => 'User',
            'is_active'     => 0,
            'email'        => $data['email'],
            'phone_number' => $data['phone_number'],
            'password'     => Hash::make($data['password']),
        ]);

        $profile_exists = Profile::where(function ($query) use ($user) {
            $query->where('contact_person_number', $user['phone_number'])
                  ->orWhere('contact_person_email', $user['email']);
        })->first();
        if($profile_exists){
            Profile::where('id', $profile_exists->id)->update([
                    'user_id' => $user->id
                ]);
        }

        return $user;
    }
}
