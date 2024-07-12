<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Landlord;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;

class RegisterController extends Controller
{
    use RedirectsUsers;

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
     * Show the application's registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Validate the incoming request data
        $this->validator($request->all())->validate();

        // Fire the Registered event after creating the user
        event(new Registered($user = $this->create($request->all())));

        // Log in the newly registered user
        $this->guard()->login($user);

        // Redirect the user to the appropriate path or perform post-registration actions
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // Validate the registration form inputs
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', 'in:student,landlord,admin'], // Added 'admin' option
            'phone' => ['nullable', 'string', 'max:15'], // Phone field (optional)
            'address' => ['nullable', 'string', 'max:255'], // Address field (optional)
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
        // Create related entity based on user type
        $relatedEntity = null;

        if ($data['user_type'] === 'student') {
            // Create a Student record with the provided data
            $relatedEntity = Student::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? '', // Collect phone from the user
                'address' => $data['address'] ?? '', // Collect address from the user
            ]);
        } elseif ($data['user_type'] === 'landlord') {
            // Create a Landlord record with the provided data
            $relatedEntity = Landlord::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? '', // Collect phone from the user
                'address' => $data['address'] ?? '', // Collect address from the user
            ]);
        } elseif ($data['user_type'] === 'admin') {
            // Create an Admin record (no additional data needed)
            $relatedEntity = Admin::create(); 
        }

        // Create a new User and associate it with the related entity
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => $data['user_type'] === 'admin', // Set is_admin flag for admin users
            'userable_type' => $data['user_type'] === 'student' ? Student::class : ($data['user_type'] === 'landlord' ? Landlord::class : ($data['user_type'] === 'admin' ? Admin::class : null)),
            'userable_id' => $relatedEntity->id, // Set userable_id from the created related entity
        ]);

        return $user;
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        // Perform any additional actions after the user has been registered
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return auth()->guard();
    }
}
