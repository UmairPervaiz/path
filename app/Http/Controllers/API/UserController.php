<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Exception;
use DB;
class UserController extends Controller
{
    public $successStatus = 200;

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function logout()
    {
        $user = Auth::user();
        $user->api_token = null;
        $user->save();
        return $this->outputJSON(null,"Successfully Logged Out");
    }


    protected function authenticated($request, $user){
        if($user->hasRole('Admin')){
            return redirect('/admin/dashboard');
        }else if($user->hasRole('employee')){
            return redirect('/employee/dashboard');
        }else if($user->hasRole('candidate')){
            return redirect('/candidate/dashboard');
        } else {
            return redirect('/');
        }
    }
    /**
     * Register apiaccessToken
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]);
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);
                // return response()->json(['error'=>'The Email Address Already Exists.'], 401);
            }
            $input = $request->all();
//            $input['phoneNo'] = $input['phone'];
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            $success['name'] =  $user->name;

            $userid = DB::table('users')->orderBy('id', 'DESC')->first();

            $data1 = array('role_id'=>'3',"model_type"=>'App\User',"model_id"=>$userid->id);
            DB::table('model_has_roles')->insert($data1);

//            $data2=array('permission_id'=>'2',"model_type"=>'App\User',"model_id"=>$userid->id);
//            DB::table('model_has_permissions')->insert($data2);
//            die();
            return response()->json(['success'=>$success], $this->successStatus);
        }
        catch(Exception $exception){
            return response()->json(['error'=>'The Email Address Already Exists.'], 401);
        }
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $roles = auth()->user()->roles()->pluck('name');
        $user = Auth::user();
        return response()->json(['success' => $user, $roles[0] ], $this->successStatus);
    }

}
