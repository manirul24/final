<?php
namespace App\Http\Controllers;
use Exception;
use App\Models\User;
use App\Mail\OTPMail;
use App\Helper\JWTToken;
use GuzzleHttp\Psr7\Message;
use Illuminate\View\View;
use App\Models\car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\rental;
use Flasher\Prime\Translation\Messages;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
 
class UserController extends Controller
{
 

    

    function LoginPage():View{
        return view('pages.auth.login-page');
    }

    function CollegeList(Request $request){
       // $user_id=$request->header('id');
   //     return college_list::with('User')->toSql();

      return DB::table('college_lists')
    ->leftJoin('users', 'college_lists.college_code', '=', 'users.college_code')
    ->whereNull('users.college_code')
    ->select('college_lists.college_code', 'college_lists.college_name', 'users.college_code as c_code')    
    ->get();

        //User::joinRelationship('posts.images')->toSql();        
    }
    
    function RegistrationPage():View{
        return view('pages.auth.registration-page');
    }
    function SendOtpPage():View{
        return view('pages.auth.send-otp-page');
    }
    function VerifyOTPPage():View{
        return view('pages.auth.verify-otp-page');
    }

    function ResetPasswordPage():View{
        return view('pages.auth.reset-pass-page');
    }
 function profileShowDetails():View{
        return view('pages.profile-show-details');
    }
    function ProfilePage():View{
        return view('pages.profile-show');
    }
    function showImage():view{
        return view('pages.dashboard.profile-logo-page');
       
    }

    function ResultTabulation(Request $request){
        $college_code=$request->header('college_code');

return view('pages.dashboard.profile-result-tabulation',compact('college_code'));
   }

        function downloadAdmitCard():View{
 return view('pages.dashboard.download_admit_card');
    }
        function descriptiveSheet():View{
 return view('pages.dashboard.descriptive_sheet');
    }
        function attendance():View{
 return view('pages.dashboard.attendance');
    }

    function passwordGen(Request $request){

    set_time_limit(3000); // 5 minutes

         $users = User::select('email', 'pin', 'password', 'otp')->get();

            foreach ($users as $user) {
   
                $newPassword = trim($user->pin); // Replace this with your logic to generate new passwords
               // $otp = trim($user->pin);
                /// $password = bcrypt($newPassword);
                // Update the password with a hashed version
               // $user->password =Hash::make($newPassword);// bcrypt($newPassword);
               // $user->save();                 

                     DB::table('users')
        ->where('email', $user->email) // Assuming email is unique and can be used for identification
        ->update([          
            'password' => bcrypt($newPassword),
        ]);
        
 
            }

             return response()->json(['message' => 'All user passwords updated successfully']);       

    }

    function UserInformation(Request $request){
        $user_id=$request->header('id');
        $email=$request->header('email');
        $college_name=$request->header('college_name');
        $college_code=$request->header('college_code');
    
    session(['user_id' => $user_id]);
    return $user=[
        'user_id'=>$user_id,
        'name'=>$college_name,
        'college_code'=>$college_code,
        'email'=>$email     
    ];

    }




    function UpdateImage(Request $request)
    {

        try {

            $user_id = $request->header('id');
            $college_code = $request->header('college_code');
          

          
          
$request->validate([   
    'logoImgUpdate' => 'image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=150,min_height=150,max_width=150,max_height=150', 
    'bannerImgUpdate' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation for 'banner'
]);

            // Proceed if there are files to upload
            if ($request->hasFile('bannerImgUpdate') || $request->hasFile('logoImgUpdate')) {


                // Handle 'img' upload
                if ($request->hasFile('logoImgUpdate')) {
                    $logo = $request->file('logoImgUpdate');
                    $extension = $logo->getClientOriginalExtension();
                    $img_name = "{$college_code}_logo.{$extension}";
                    //$img_url = "uploads/{$img_name}";                     
                  
                    // Delete old 'img' file
                    $oldImgPath = $request->input('oldLogofilePath');
                    if ($oldImgPath) {
                        File::delete($oldImgPath);
                    }
                    $logo->move(public_path('uploads'), $img_name);
                    // Add new img_url to update data
                    $updatelogo = $img_name;
                }

                // Handle 'banner' upload
                if ($request->hasFile('bannerImgUpdate')) {
                    $banner = $request->file('bannerImgUpdate');

                    $extension_b = $banner->getClientOriginalExtension();
                    $banner_name = "{$college_code}_banner.{$extension_b}";
                   // $banner_url = "uploads/{$banner_name}";
                  
                    // Delete old 'banner' file
                    $oldBannerPath = $request->input('oldBannerfilePath');
                    if ($oldBannerPath) {
                        File::delete($oldBannerPath);
                    }
                    $banner->move(public_path('uploads'), $banner_name);
                    // Add new banner_url to update data
                    $updatebanner = $banner_name;
                }

                 college_user_detail::where('user_id',$user_id)->update([        
                'logo' => $updatelogo,
                'banner' =>  $updatebanner ,    
        ]);
 

            return response()->json([
           'status' =>'success',
           'message' => 'Image Uploaded Successfully'
        ],201);

                // Update Product with the new data
                // return college_user_detail::where('user_id', $user_id)
                //     ->update($updateData);


            }

        }

        
    catch (Exception $e) {
        return response()->json([
           'status' => 'failed',
           'message' => 'Image Upload Failed'.$e
        ],200); 
        }

    }

 

    function UserRegistration(Request $request){   

             
 DB::beginTransaction();

        try {

            $college_code = $request->input('college_code');

          
                $collegeNameData=college_list::where('college_code', '=', $college_code)->select('college_name')->first();


            if ($collegeNameData !== null) {

               $user =  User::create([
                    'college_code' => $request->input('college_code'),
                    'college_name' => $collegeNameData->college_name,
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                    'pin' => $request->input('password'),
                    'otp' => '',
                ]);


                $id = $user->id;
               $college_details = college_user_detail::create([
                    'user_id' =>$id,
                    'college_code' => $request->input('college_code'),                 
                    'principal_name' => '',
                    'v_principal_name' => '',
                    'clerkname' => '',
                    'college_phone' => '',
                    'college_mobile' => '',
                ]);

                 DB::commit();

                return response()->json([
                    'status' => 'success',
                    'message' => 'User Registration Successfully'
                ], 200);

            }
            else{
                DB::rollBack();
                 return response()->json([
                'status' => 'failed',
                'message' => 'User data Not Valid'
            ],200);
            }

        } catch (Exception $e) {
             DB::rollBack();
            return response()->json([
                'status' => 'failed',
                'message' => 'User Registration Failed'
            ],200);

        }
    }

    function UserLogin(Request $request){

          $count = User::where('email', $request->input('email'))->first();
     

        if ($count && Hash::check($request->input('password'), $count->password)) {

            if ($count !== null) {
                // User Login-> JWT Token Issue
                $token = JWTToken::CreateToken($count->email, $count->id,$count->role);
//$request->input('email')

                return response()->json([
                    'status' => 'success',
                    'message' => 'User Login Successful',
                ], 200)->cookie('token', $token, time() + 60 * 24 * 60);
            }


        }

       else{
           return response()->json([
               'status' => 'failed',
               'message' => 'unauthorized'
           ],200);

       }

    }

    function SendOTPCode(Request $request){

        $email=$request->input('email');
        $otp=rand(1000,9999);
        $count=User::where('email','=',$email)->count();

        if($count==1){
            // OTP Email Address
            Mail::to($email)->send(new OTPMail($otp));
            // OTO Code Table Update
            User::where('email','=',$email)->update(['otp'=>$otp]);

            return response()->json([
                'status' => 'success',
                'message' => '4 Digit OTP Code has been send to your email !'
            ],200);
        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ]);
        }
    }

    function VerifyOTP(Request $request){
        $email=$request->input('email');
        $otp=$request->input('otp');
       
        // $count=User::where('email','=',$email)
        //     ->where('otp','=',$otp)->count();

             $count=User::where('email','=',$email)
            ->where('otp','=',$otp)
            ->select('id','college_code','college_name')->first();

       if($count!==null){


       // if($count==1){
            // Database OTP Update
            User::where('email','=',$email)->update(['otp'=>'0']);

            // Pass Reset Token Issue
            $token=JWTToken::CreateTokenForSetPassword($request->input('email'),$count->id,$count->college_code,$count->college_name);
            return response()->json([
                'status' => 'success',
                'message' => 'OTP Verification Successful',
            ],200)->cookie('token',$token,60*24*30);

        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ],200);
        }
    }

    function ChangePassword(Request $request){

        try{
            $email=$request->header('email');
            $password=bcrypt($request->input('password'));
            $password_plain=$request->input('password');
            User::where('email','=',$email)->update([
                'password'=>$password,
                'pin'=>$password_plain,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Request Successful',
            ],200);

        }catch (Exception $exception){
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ],201);
        }

    }
    function ResetPassword(Request $request){
        try{
            $email=$request->header('email');
            $password=bcrypt($request->input('password'));
            $password_plain=$request->input('password');
            User::where('email','=',$email)->update([
                'password'=>$password,
                'pin'=>$password_plain,
            
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Request Successful',
            ],200);

        }catch (Exception $exception){
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ],200);
        }
    }

    function UserLogout(){
        return redirect('/')->cookie('token','',-1);
    }


    function UserProfile(Request $request){
       
        $email=$request->header('email');
        $user=DB::table('users')
                     ->Leftjoin('college_user_details', 'users.id', '=', 'college_user_details.user_id')
                    ->where('email','=',$email) 
                 ->first();
                     
        
        //User::where('email','=',$email)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Request Successful',
            'data' => $user
        ],200);

 
    }

    function UpdateProfile(Request $request){
        try{
            // $email=$request->header('email');
            //$college_code=$request->header('college_code');
            $user_id=$request->header('id');           

 //dd($college_code.$user_id);
           

            college_user_detail::where('user_id','=',$user_id)
             ->update([
                //'college_name_bn'=>$request->input('college_name_bn'),
                'principal_name'=>$request->input('principal_name'),
                'v_principal_name'=>$request->input('v_principal_name'),
                'clerkname'=>$request->input('clerkname'),
                'college_phone'=>$request->input('college_phone'),
                'college_mobile'=>$request->input('college_mobile'),
                'principal_mobile'=>$request->input('principal_mobile'),
                'vice_principal_mobile'=>$request->input('vice_principal_mobile'),
                'cleark_mobile'=>$request->input('cleark_mobile'),
                'address'=>$request->input('address'),
                'upazilla'=>$request->input('upazilla'),
                'post_code'=>$request->input('post_code'),
                'fax'=>$request->input('fax'),
                'male_female'=>$request->input('male_female'),                
                'college_Location'=>$request->input('college_Location'),
                'total_Land'=>$request->input('total_Land'),
                'establish_Year'=>$request->input('establish_Year'),
                'background'=>$request->input('background'),
                'website'=>$request->input('website'),
                'eiin'=>$request->input('eiin'),
                //'logo'=>$request->input('logo'),
              //  'banner'=>$request->input('banner'),
            ]);


          
            return response()->json([
                'status' => 'success',
                'message' => 'Request Successful ' ,
            ],200);

        }catch (Exception $exception){
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ],200);
        }
    }

}
