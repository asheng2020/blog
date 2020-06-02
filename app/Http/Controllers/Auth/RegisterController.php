<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use app\Handlers\ImageUploadHandler;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        $messages = [
            'avatar.image' => '请上传图片文件',
        ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar'    => ['image'],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data, ImageUploadHandler $uploader)
    {
        if ($data['avatar']) {
            $result = $uploader->save($data['avatar'], 'avatars', 1);
            if ($result) {
                $data['avatar'] = $result['path'];
            } else {
                var_dump(2);
                // back()->withErrors(['avatar' => '请上传图片文件']);
            }
        }
dd($data);
        // return User::create([
        //     'name'          => $data['name'],
        //     'email'         => $data['email'],
        //     'password'      => Hash::make($data['password']),
        //     'logined_at'    => Carbon::now(),
        //     'avatar'        => $data['avatar'],
        // ]);
    }
}
