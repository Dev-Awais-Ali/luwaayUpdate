<?php

namespace App\Http\Controllers\Front;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Conversation;
use App\Models\Generalsetting;
use App\Models\Message;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\VendorBotique;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class VendorController extends Controller
{  

    public function storeList()
    {
        $stores=VendorBotique::all();
        return view('front.store-list',compact('stores'));
    }


    public function storeDetail( $store_name)
    {

      $store=VendorBotique::where('shop_name','=',$store_name)->firstOrFail();
      $products=$store->products->paginate(12);
      $categories=Category::where('status',1)->get();
      $token=1;
      return view('front.store-detail',compact('store','products','token','categories'));
    }    

    public function getSearchedProduct($store_name=null,$cat_slug=null,$sub_cat=null,$child_cat=null)
    {  
        // dd($cat_slug);
        if(!empty($cat_slug) && empty($sub_cat) && empty($child_cat)){
        $cat=Category::where('slug','=',$cat_slug)->firstOrFail(); 
        $store=VendorBotique::where('shop_name','=',$store_name)->firstOrFail();
        $products = Product::where('user_id',$store->id)->where('category_id','=',$cat->id)->paginate(12);
          }
        if(!empty($sub_cat) && empty($child_cat))
         {
            $sub_cat=Subcategory::where('slug','=',$sub_cat)->firstOrFail(); 
            $store=VendorBotique::where('shop_name','=',$store_name)->firstOrFail();
            $products = Product::where('user_id',$store->id)->where('subcategory_id','=',$sub_cat->id)->paginate(12);            
             
         } 

         if(!empty($child_cat)){

            $child_cat=Childcategory::where('slug','=',$child_cat)->firstOrFail(); 
            $store=VendorBotique::where('shop_name','=',$store_name)->firstOrFail();
            $products = Product::where('user_id',$store->id)->where('childcategory_id','=',$child_cat->id)->paginate(12);
         } 
        // }
        // else{
        // $search =$request->search;
        // $store=VendorBotique::findOrFail($request->user_id);

        // $products = Product::where('user_id',$store->id)->where('name','LIKE',"%{$search}%")->paginate(12);
         
        $categories=Category::where('status',1)->get();
        $token=0;  
        return view('front.store-detail',compact('store','products','token','categories')); 
    } 

     public function getFilteredProduct(Request $request)     
       {

        $search =$request->search;
        $store=VendorBotique::where('shop_name','=',$request->Store_name)->firstOrFail();
        $products = Product::where('user_id',$store->id)->where('name','LIKE',"%{$search}%")->paginate(12)->appends(['Store_name'=>$request->Store_name,'search'=>$request->search]);

        $categories=Category::where('status',1)->get();
        $token=2;  
        return view('front.store-detail',compact('store','products','token','categories'));

       }      

    public function index(Request $request,$slug)
    {
        $this->code_image();
        // $sort = "";
        $minprice = $request->min;
        $maxprice = $request->max;
        $sort = $request->sort;
        $string = str_replace('-',' ', $slug);
        $vendor = User::where('shop_name','=',$string)->firstOrFail();
        $data['vendor'] = $vendor;
        $data['services'] = DB::table('services')->where('user_id','=',$vendor->id)->get();
        // $oldcats = $vendor->products()->where('status','=',1)->orderBy('id','desc')->get();
        // $vprods = (new Collection(Product::filterProducts($oldcats)))->paginate(9);

        // Search By Price
        $prods = Product::when($minprice, function($query, $minprice) {
                                      return $query->where('price', '>=', $minprice);
                                    })
                                    ->when($maxprice, function($query, $maxprice) {
                                      return $query->where('price', '<=', $maxprice);
                                    })
                                     ->when($sort, function ($query, $sort) {
                                        if ($sort=='date_desc') {
                                          return $query->orderBy('id', 'DESC');
                                        }
                                        elseif($sort=='date_asc') {
                                          return $query->orderBy('id', 'ASC');
                                        }
                                        elseif($sort=='price_desc') {
                                          return $query->orderBy('price', 'DESC');
                                        }
                                        elseif($sort=='price_asc') {
                                          return $query->orderBy('price', 'ASC');
                                        }
                                     })
                                    ->when(empty($sort), function ($query, $sort) {
                                        return $query->orderBy('id', 'DESC');
                                    })->where('status', 1)->where('user_id', $vendor->id)->get();

        $vprods = (new Collection(Product::filterProducts($prods)))->paginate(9);
        $data['vprods'] = $vprods;


        return view('front.vendor', $data);
    }

    //Send email to user
    public function vendorcontact(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $vendor = User::findOrFail($request->vendor_id);
        $gs = Generalsetting::findOrFail(1);
            $subject = $request->subject;
            $to = $vendor->email;
            $name = $request->name;
            $from = $request->email;
            $msg = "Name: ".$name."\nEmail: ".$from."\nMessage: ".$request->message;
        if($gs->is_smtp)
        {
            $data = [
                'to' => $to,
                'subject' => $subject,
                'body' => $msg,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
        }
        else{
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
            mail($to,$subject,$msg,$headers);
        }


    $conv = Conversation::where('sent_user','=',$user->id)->where('subject','=',$subject)->first();
        if(isset($conv)){
            $msg = new Message();
            $msg->conversation_id = $conv->id;
            $msg->message = $request->message;
            $msg->sent_user = $user->id;
            $msg->save();
        }
        else{
            $message = new Conversation();
            $message->subject = $subject;
            $message->sent_user= $request->user_id;
            $message->recieved_user = $request->vendor_id;
            $message->message = $request->message;
            $message->save();
            $msg = new Message();
            $msg->conversation_id = $message->id;
            $msg->message = $request->message;
            $msg->sent_user = $request->user_id;;
            $msg->save();

        }
    }

    // Capcha Code Image
    private function  code_image()
    {
        $actual_path = str_replace('project','',base_path());
        $image = imagecreatetruecolor(200, 50);
        $background_color = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image,0,0,200,50,$background_color);

        $pixel = imagecolorallocate($image, 0,0,255);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixel);
        }

        $font = $actual_path.'assets/front/fonts/NotoSans-Bold.ttf';
        $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $length = strlen($allowed_letters);
        $letter = $allowed_letters[rand(0, $length-1)];
        $word='';
        //$text_color = imagecolorallocate($image, 8, 186, 239);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        $cap_length=6;// No. of character in image
        for ($i = 0; $i< $cap_length;$i++)
        {
            $letter = $allowed_letters[rand(0, $length-1)];
            imagettftext($image, 25, 1, 35+($i*25), 35, $text_color, $font, $letter);
            $word.=$letter;
        }
        $pixels = imagecolorallocate($image, 8, 186, 239);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixels);
        }
        session(['captcha_string' => $word]);
        imagepng($image, $actual_path."assets/images/capcha_code.png");
    }


}
