<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

use App\User;
use Mail;
use App\Mail\VerifyAccountMail;
use Illuminate\Http\Request;
use Session;


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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        Session::flash('alert-success',"Registered!Verify your email to activate your account.");
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'Verifytoken'=>str::random(40),
        ]);

        $thisUser = User::findOrFail($user->id);
    $this->sendEmail($thisUser);
    return  $user;
    }


    public function sendEmail($thisUser){
            Mail::to($thisUser['email'])->send(new VerifyAccountMail($thisUser));
    }

    public function verifyEmailFirst(){
        return view('email.verifyEmailFirst');
    }


    public function sendEmailDone($email,$Verifytoken){


        $user = User::where(['email'=>$email,'Verifytoken'=>$Verifytoken])->first();

        $user->update(['Verifytoken'=>NULL]);
          Session::flash('alert-success','Success!Account Activated.Now login.');

           return redirect()->route('login');

        }
    }
    /*public function register(Request $request){

        $input = $request->all();

        $validator = $this->validator($input);

        if($validator->passes()){
            $user = $this->create($input)->toArray();
            $user['link'] = str_random(30);

            DB::table('users_activations')->insert(['user_id' => $user['id'],'token' => $user['link']]);

            /*Mail::send('mail.activation', $user, function($message) use ($user){
                $message -> to($user['email']);
                $message -> subject('OneLove.com-Activation Code');
            });*/

           /* Mail::to($user['email'])->send(new Email());
             return redirect()->to('login')->with('Success','We sent activation code,please check your email');
        }

        return back()->with('Error',$validator->errors());
    }
 
        //user activation function-check whether the new user is activated or not
        public function userActivation($token){
            $check =DB::table('users_activations')->where('token',$token)->first();

            if(!is_empty($check)){

                $user=User::find($check->user_id);
                if($user->is_activated==1){

                    return redirect()->to('login')->with('Success','User is already activated');

                }

                $user->update(['is_activated'=>1]);
                DB::table('users_activations')->where('token')->delete();

                return redirect()->to('login')->with('Success','User activated successfully');
                
            }
                return redirect()->to('login')->with('warning','Token Invalid');
        }*/


