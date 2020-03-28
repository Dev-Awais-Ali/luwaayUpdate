<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\VendorBotique;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VendorBotiqueController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest:vendor_botique')->except('logout');
    }

    public function showLoginForm()
    {
      return view('front.vendor-login-botique');  
    }   

    public function showRegForm()
    {
        $countries =Country::all();
        return view('front.vendor-reg-botique',compact('countries'));

    }

    public function Register(Request $request )
    {
       $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|email|unique:vendor_botiques',
            'shop_name'=>'required',
            'owner_name'=>'required',
            'shop_number'=>'required',
            'shop_address'=>'required',                        
            'password'=>['required','confirmed'],
            'country_id'=>'required',
            'state_id'=>'required',
            'city_id'=>'required',
            'zip_code'=>'required',
            'reg_no'=>'required',
            'phone'=>'required|min:11|numeric',            
            'shop_img'=>'required|image',
            'desc'=>'required',

       ]);



       $vendorbotique= new VendorBotique();
       $vendorbotique->fname=$request->fname;
       $vendorbotique->lname=$request->lname;
       $vendorbotique->email=$request->email;
       $vendorbotique->shop_name=$request->shop_name;
       $vendorbotique->owner_name=$request->owner_name;
       $vendorbotique->shop_no=$request->shop_number;
       $vendorbotique->shop_address=$request->shop_address;
       $vendorbotique->password=bcrypt($request->password);
       $vendorbotique->country_id=$request->country_id;
       $vendorbotique->state_id=$request->state_id;
       $vendorbotique->city_id=$request->city_id;
       $vendorbotique->zip_code=$request->zip_code;
       $vendorbotique->reg_no=$request->reg_no;
       $vendorbotique->phone_no=$request->phone;
       $vendorbotique->img=$request->file('shop_img')->store('/VendorBotique');
       $vendorbotique->description=$request->desc;
       $vendorbotique->save();

       return redirect()->route('vendor.login.botique');



       

    }    

    public function getStateList(Request $request)
        {
            
            $states = DB::table("states")
            ->where("country_id",$request->country_id)
            ->pluck("name","id");
            return response()->json($states);
        }

    public function getCityList(Request $request)
        {
            $cities = DB::table("cities")
            ->where("state_id",$request->state_id)
            ->pluck("name","id");
            return response()->json($cities);
        }    

    public function login(Request $request)
        {
            
          // Validate the form data
          $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:4'
          ]);
          
          // Attempt to log the user in
          if (Auth::guard('vendor_botique')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
              return redirect()->intended(route('vendor-dashboard'));
            // return redirect()->intended(route('doctor.dashboard'));
          } 
          // if unsuccessful, then redirect back to the login with the form data
         return response()->json(array('errors' => [ 0 => 'Credentials Doesn\'t Match !' ])); 
        }



        public function logout()
    {
        Auth::guard('vendor_botique')->logout();
        return redirect()->route('vendor.login.botique');
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeDetail()
    {
      return view('front.store-detail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeList()
    {
      return view('front.store-list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
