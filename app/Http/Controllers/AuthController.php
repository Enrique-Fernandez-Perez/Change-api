<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
}
// $request->validate();
        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                /*'status' => 'error',
                'message' => 'Unauthorized',*/
                'error' => 'Unauthorized. Either email or password is wrong.',
            ], 401);
}$user = Auth::user();
        return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => env('JWT_TTL') * 60, //auth()->factory()->getTTL() * 60,
        'user' => $user,
    ]);
}
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
}
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
// 'role_id'=> "2"
        ]);
//$token = Auth::login($user);
        return response()->json([
        'message' => "User successfully registered",
        'user' => $user,
    ]);
}
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(
        Auth::user(),
    );
}
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(){
        Auth::logout();
        return response()->json([
            'message' => 'User successfully signed out',
        ]);
}
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $user = Auth::user();
        return response()->json([
        'access_token' => Auth::refresh(),
        'token_type' => 'bearer',
        'expires_in' => env('JWT_TTL') * 60,
        'user' => $user,
    ]);
}

    //
//Route::post('register', [\App\Http\Controllers\AuthController::class, 'store']);
//Route::post('login', [\App\Http\Controllers\AuthController::class, 'store']);
//Route::post('logout', [\App\Http\Controllers\AuthController::class, 'destroy']);
//    public function __construct()
//    {
//        $this->middleware('auth:api', ['except' => ['login','register']]);
//    }
//
//    public function login(Request $request)
//    {
//        $request->authenticate();
//
//        $request->session()->regenerate();
//
//        return response()->json(['Usuario logeado'], 200);
//    }
//
//    public function register(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6',
////            'c_password' => 'required|same:password',
//        ]);
////        return response()->json(['Eliminado'], 200);
//        if($validator->fails()){
//            return response()->json($validator->messages(), 400);
//        }
//
//        $user = User::create([
//            'name' => $request->get('name'),
//            'email' => $request->get('email'),
//            'password' => Hash::make($request->get('password')),
//        ]);
//        return response()->json(['message'=>'User Created','data'=>$user],200);
//    }
//
//    public function destroy(Request $request)
//    {
//        Auth::guard('web')->logout();
//
//        $request->session()->invalidate();
//
//        $request->session()->regenerateToken();
//
//        return response()->json(['Usuario'], 200);
//    }

}
