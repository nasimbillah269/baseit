<?php

use App\Models\General;
use App\Models\Media;
use App\Models\Country;
use App\Models\Cart;
use App\Models\WishList;
use App\Models\Post;
use App\Models\PostExtra;
use App\Models\Attribute;
use Carbon\Carbon;


function general(){
  return $general =General::first();
}

function websiteTitle($title=null){
  
  $hasTitle =$title?' - ':'';
  $text =general()->title;
  $text1=general()->subtitle;
  $text2=$text&&$text1?' - ':'';
  return $title.$hasTitle.$text.$text2.$text1;
}

function isMobileDevice() {
  return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo 
|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i" 
, $_SERVER["HTTP_USER_AGENT"]); 
}

function adminTheme(){
  $theme=general()->adminTheme.'.';
  if(isMobileDevice()){
    $theme=general()->adminTheme.'.';
  }
  return $theme;
}

function welcomeTheme(){
  $theme=general()->theme.'.';
  if(isMobileDevice()){
    $theme=general()->theme.'.';
  }
  return $theme;
}

function assetLink(){
  return ''.general()->theme;
}

function assetLinkAdmin(){
  return ''.general()->adminTheme;
}

function geoData($type=null,$parent=null,$id=null){

  $data =Country::orderBy('name')->select(['id','type','parent_id','name']);
  if($type){
    $data =$data->where('type',$type);
  }

  if($parent){
    $data =$data->where('parent_id',$parent);
  }

  if($id){
    $data =$data->find($id);
  }else{
    $data =$data->get();
  }
  
  return $data;
}


function shippingCharge($id){
    $shippingCharge =0;

    $datas = general()->outside_metro_area;
    $dataArray = array_filter(explode(',', $datas));
    if(in_array($id, $dataArray)){
        $shippingCharge =general()->outside_metro_charge;
    }else{
        $shippingCharge =general()->inside_dhaka_shipping_charge;
    }
    
    return $shippingCharge;
}

function bn2enNumber ($number){
  $search_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
  $replace_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
  $en_number = str_replace($search_array, $replace_array, $number);

  return $en_number;
}

function en2bnNumber ($number){
  $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
  $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
  $en_number = str_replace($search_array, $replace_array, $number);

  return $en_number;
}

function en2bnMonth($month){
  $search_array= array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October","November","December","Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct","Nov","Dec","01", "02", "03", "04", "05", "06", "07", "08", "09", "10","11","12");
  $replace_array= array("জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বর", "অক্টোবর","নভেম্বর","ডিসেম্বর","জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বর", "অক্টোবর","নভেম্বর","ডিসেম্বর","জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বর", "অক্টোবর","নভেম্বর","ডিসেম্বর");
  $en_number = str_replace($search_array, $replace_array, $month);
  return $en_number;
}

function priceFormat($amount=0)
{
  $formatAmount ='';
  $formatAmount = number_format($amount,general()->currency_decimal);
  return $formatAmount;
}

function priceFullFormat($amount=0)
{
  $formatAmount ='';
  $amountFormat = number_format($amount,general()->currency_decimal);
  if(general()->currency_position==0){
    $formatAmount = general()->currency.' '.$amountFormat;
  }else{
     $formatAmount = $amountFormat.' '.general()->currency;
  }
  return $formatAmount;
}

// $toEmail may be one address, a comma separated list, or an array. $replyTo = [email, name] (e.g. the visitor).
function sendMail($toEmail,$toName,$subject,$datas,$template,$attachments=null,$replyTo=null){

  $recipients = collect(is_array($toEmail) ? $toEmail : explode(',', (string) $toEmail))
      ->map(fn ($e) => trim($e))
      ->filter(fn ($e) => filter_var($e, FILTER_VALIDATE_EMAIL))
      ->unique()->values()->all();
  if(!$recipients){
      \Log::warning('sendMail: no valid recipient', ['to' => $toEmail, 'subject' => $subject]);
      return false;
  }

  try {

      Mail::send($template,compact('datas'), function ($message) use ($recipients,$toName,$subject,$attachments,$replyTo) {
        $message->from(general()->mail_from_address, general()->mail_from_name);
        $message->to(array_shift($recipients),$toName)
        ->subject($subject);
        foreach ($recipients as $cc) {
            $message->cc($cc);
        }
        if($replyTo && filter_var($replyTo[0] ?? null, FILTER_VALIDATE_EMAIL)){
            $message->replyTo($replyTo[0], $replyTo[1] ?? null);
        }

        if($attachments){
            // Attachments
            foreach ($attachments as $attachment) {
                $message->attach($attachment['path'], [
                    'as' => $attachment['name'],
                    'mime' => $attachment['mime'],
                ]);
            }
        }
    });
   
      return true;
  } catch (\Throwable $ex) {
      // Logged so a broken SMTP setting is visible in storage/logs/laravel.log
      \Log::error('sendMail failed: '.$ex->getMessage(), ['to' => $toEmail, 'subject' => $subject, 'host' => config('mail.mailers.smtp.host')]);
      return false;
  }

}

function sendSMS($to,$msg){
  $userId = general()->sms_username;
  $pass = general()->sms_password;
  $masking = general()->sms_senderid;
  if(general()->sms_type=='Non Masking'){
  $url =general()->sms_url_nonmasking; 
  return "{$url}?username={$userId}&password={$pass}&number={$to}&message={$msg}";
  }else{
  $url =general()->sms_url_masking;
  return "{$url}?username={$userId}&password={$pass}&number={$to}&message={$msg}&senderid={$masking}";
  }
}

function slider($location=null){
  return Attribute::latest()->where('type',1)->where('status','active')->where('location',$location)->first();
}

function menu($location=null){
  return Attribute::latest()->where('type',8)->where('status','active')->where('location',$location)->first();
}

function page($id=null){
  return Post::where('type',0)->find($id);
}

function pageTemplate($template=null){
  return Post::where('type',0)->where('template',$template)->first();
}

function uploadFile($file,$src,$srcType,$fileUse,$author=null,$fileStatus=true){

  // Only known media/document types may be saved into public/ (blocks .php, .phtml, .phar, .html, .htaccess ...)
  $allowedExt = ['jpg','jpeg','png','gif','webp','svg','ico','pdf','doc','docx','xls','xlsx','csv','zip','rar','mp4','webm','mov','wmv','mp3'];
  if(!in_array(strtolower($file->getClientOriginalExtension()), $allowedExt, true)){
      abort(422, 'This file type is not allowed.');
  }

  if($fileStatus){
      $media = Media::where('src_type',$srcType)->where('use_Of_file',$fileUse)->where('src_id',$src)->first();
  }else{
      $media = null;
  }

  if(!$media){
    $media =new Media();
    }else{
      if(File::exists(public_path($media->file_url))){
            File::delete(public_path($media->file_url));
        }
        if(File::exists(public_path($media->file_url_sm))){
            File::delete(public_path($media->file_url_sm));
        }
        if(File::exists(public_path($media->file_url_md))){
            File::delete(public_path($media->file_url_md));
        }
        if(File::exists(public_path($media->file_url_lg))){
            File::delete(public_path($media->file_url_lg));
        }
    }
    
    $name = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
    $fullname = basename($file->getClientOriginalName());
    $ext =$file->getClientOriginalExtension();
    $size =$file->getSize();
    $mimeType = $file->getMimeType();

    $year =carbon::now()->format('Y');
    $month =carbon::now()->format('M');
    $folder = $month.'-'.$year;

    $img =time().'.'.uniqid().'.'.$file->getClientOriginalExtension();
    $path ="medies/".$folder;
    $fullpath ="medies/".$folder.'/'.$img;
    $media->src_type=$srcType;
    $media->use_Of_file=$fileUse;
    $media->src_id=$src;
    $media->file_name=Str::limit($fullname,250);
    $media->alt_text=Str::limit($name,250);
    $media->file_rename=Str::limit($img,100);
    $media->file_size=$size;
    $media->mine_type=$mimeType;
    if($ext=='png' || $ext=='jpeg' || $ext=='svg' || $ext=='gif' || $ext=='jpg' || $ext=='webp'){
      $media->file_type=1;
      }elseif($ext=='pdf'){
      $media->file_type=2;
      }elseif($ext=='docx'){
      $media->file_type=3;
      }elseif($ext=='zip' || $ext=='rar'){
      $media->file_type=4;
      }elseif($ext=='mp4' || $ext=='webm' || $ext=='mov' || $ext=='wmv'){
      $media->file_type=5;
      }elseif($ext=='mp3'){
      $media->file_type=6;
    }
    $file->move(public_path($path), $img);
    $media->file_url =$fullpath;
    $media->file_path =$path;
    $media->addedby_id=$author;
    $media->save();

    return $media;

}


function myCouponCheck($totalAmount,$uniqCartPrice){
    
  $total =$totalAmount;
  $message =null;
  $discount =0;
  $status=true;
  $coupon=null;
  
  $cId =Session::get('my_coupon_id');
  
  $coupon =Attribute::latest()->where('type',13)->where('status','active')->where('parent_id',null)
          ->where('id',$cId)
          ->first();

  if(!$coupon){
      $message='Coupon Are Not Found';
      $status =false;
  }else{
      
      
      if($status==true && $coupon->min_shopping && $coupon->min_shopping > $total){
          $message ='Sorry,Your coupon Are Invalid. Please, minimum Shopping '.priceFullFormat($coupon->min_shopping);
          $status =false;
      }

      if($status==true && $coupon->max_shopping && $coupon->max_shopping < $total){
          $message ='Sorry, Your coupon Are Invalid. Because, maximum Shopping '.priceFullFormat($coupon->max_shopping);
          $status =false;
      }

      if($status==true && $coupon->menu_type==1 && $coupon->amounts > $total){
          $message = 'Sorry, Your coupon Are Invalid. Because, Discount Big Amount ('.priceFullFormat($coupon->amounts).') Over Shopping Amount';
          $status =false;
      }

      if($status==true && $coupon->menu_type==0 && $coupon->amounts > 100){
          $status =false;
          $message ='Sorry, your coupon Are Invalid. Because, Discount Can Not Over 100%';

      }
      
      if($status==true){
      
          if($coupon->menu_type==1){
          $discount = $coupon->amounts; 
          }else{
              if($coupon->target==1){
                  $discount =$uniqCartPrice * ($coupon->amounts / 100);
              }else{
                  $discount = $total * ($coupon->amounts / 100);
              }
          }

      }
  }
  
  return compact('discount','message','coupon','status');

}


function myCart($cookie=null){

  $carts = array();
  $cartsProductIds = array();
  $cartsCtgIds = array();
  $shippingZones=array();
  $wlCount = 0;
  $cpCount = 0;
  $cartsCount = 0;
  $shippingCharge = 0;
  $cartTax = 0;
  $couponDisc = 0;
  $grandTotal = 0;
  $cartTotalPrice = 0;
  $shippingActive = null;
  $myCoupon=null;
  $myCouponMessage=null;
  $shippingActiveClass=null;
  $shippingNote =null;
  if( $cookie)
  {
    
    $shippingZones=PostExtra::latest()->where('type',3)->where('id','<>',59)->where('status','active')->where('parent_id',null)->select(['id','name','content','shipping_charge'])->get();
    $shippingZones->map(function($item){
        return $item->shipping_type='1';
    });
    
    $shippingSession =json_decode(Session::get('shippingServiceOptions'));
    $shippingAddress =Session::get('shippingAddres');
    
    if($shippingSession){
        if(isset($shippingSession->shippingServiceOptions)){
            $shippingSession = $shippingSession->shippingServiceOptions;
        }else{
            $shippingSession=array();
        }
    }else{
        $shippingSession=array();
    }
    
    foreach($shippingSession as $ship){
      $shippingZones->push(['id'=>$ship->code,'name'=>$ship->serviceCheckoutName,'content'=>'Company : '.$ship->serviceName,'shipping_charge'=>$ship->totalCost,'shipping_type'=>2]);
        
    }
    
    $checkShippingSelect =Session::get('selectZone');
    if(!$checkShippingSelect){
        if($zoneFF =$shippingZones->first()){
            Session::put('selectZone',['id'=>$zoneFF['id'],'type'=>$zoneFF['shipping_type']]);
        }
    }
    
    
    
    $shippingSelect =Session::get('selectZone');
    if($shippingSelect){
        if($shippingSelect['type']==2){
            $shippingActive = $shippingZones->where('shipping_type',2)->where('id',$shippingSelect['id'])->first();
            $shippingActiveClass='active_2_';
        }else{
            $shippingActive = $shippingZones->where('shipping_type',1)->where('id',$shippingSelect['id'])->first();
            $shippingActiveClass=null;
            $shippingActiveClass='active_1_';
        }
    }
    
    
    $carts = Cart::where('cookie', $cookie)->latest()->select(['id','user_id','product_id','sku_id','cookie','quantity','emi','coupon_id','color','size'])->get();
    $cartsCount=$carts->sum('quantity');
    $uniqCartPrice=0;
    $mci =0;
    if ($mci = Session::get('my_coupon_id')) 
    {
        $myCoupon =Attribute::latest()->where('type',13)->where('status','active')->where('parent_id',null)->where('id',$mci)->first();
    }

    foreach ($carts as $cart) 
        {
            if($cart->product){
                $cartTotalPrice += $cart->subtotal();
            }else{
                $cart->delete();  
            }
            
            unset($cart->product);
        }
    
    $wlCount = WishList::where('cookie',$cookie)->where('type',0)->count();
            
    $cpCount = WishList::where('cookie',$cookie)->where('type',2)->count();
    
    // Shipping Charge
    $shippingCharge=0;
    // Shipping Charge
    if($shippingActive){
        $shippingCharge=$shippingActive['shipping_charge'];
        $shippingActiveClass.=$shippingActive['id'];
        
        if(isset($shippingActive['name'])){
          $shippingNote.=$shippingActive['name'];
      }
      if(isset($shippingActive['shipping_charge'])){
          if($shippingActive['shipping_charge'] > 0){
              $shippingNote.=' | Fee- '.priceFullFormat($shippingActive['shipping_charge']);
          }
      }
      if(isset($shippingActive['shipping_type']) && isset($shippingActive['content'])){
          if($shippingActive['shipping_type']==2){
              $shippingNote.=' | Company: Pack And Send';
          }else{
              $shippingNote.=' | '.$shippingActive['content'];
          }
      }
        
    }

    
    // Coupon Apply
    $couponData = myCouponCheck($cartTotalPrice,$uniqCartPrice);
    
    if ($couponData)
    {
        $couponDisc=$couponData['discount'];
        $myCouponMessage=$couponData['message'];
    }
            
    //Tax Charge
    $cartTax =0;
    
    if(general()->tax_status==2){
      $cartTax =  ($cartTotalPrice*general()->tax)/100;
    }
    
    $grandTotal = $cartTotalPrice + $shippingCharge + $cartTax - $couponDisc;
    
  }



  return compact('carts','cartTotalPrice','wlCount','cpCount','cartsCount','shippingZones','shippingActiveClass','shippingActive','shippingNote','shippingAddress','shippingCharge','cartTax','couponDisc','myCoupon','myCouponMessage','grandTotal');

}


/*
|--------------------------------------------------------------------------
| BASE IT website helpers (content lives in config/baseit.php)
|--------------------------------------------------------------------------
*/

// Image from old WordPress uploads: local copy first, else remote fallback.
// Local path: public/welcome/baseit/uploads/{path}
function bimg($path){
  $local ='welcome/baseit/uploads/'.ltrim($path,'/');
  if(file_exists(public_path($local))){
    return asset($local);
  }
  return config('baseit.image_fallback').ltrim($path,'/');
}

// Menu icon: "remote:2016/09/1.png" => uploads image, otherwise local icon file
function bicon($img){
  if(!$img){
    return null;
  }
  if(str_starts_with($img,'remote:')){
    return bimg(substr($img,7));
  }
  return asset('welcome/images/icon/'.$img);
}

// URL of a BASE IT page by slug ('' = home)
function bpage($slug=''){
  if($slug==='' || $slug===null){
    return route('index');
  }
  if($slug==='login'){
    return route('login');
  }
  return url($slug);
}

// "Order Now" link: contact page that shows what is being ordered (service, package, price)
function border($service, $package=null, $price=null){
  $query =array_filter([
    'order'   => $service,
    'package' => $package,
    'price'   => $price,
  ], fn ($v) => $v !== null && $v !== '');
  return bpage('contact-us').'?'.http_build_query($query).'#order';
}

// What the contact page should show/prefill for an order (reads ?order=&package=&price=, or old input after a failed submit)
function border_info(){
  $service =trim((string) old('order', request('order')));
  $package =trim((string) old('package', request('package')));
  $price   =trim((string) old('price', request('price')));
  $label   =$service.($package !== '' ? ' - '.$package : '');

  return [
    'service' => $service,
    'package' => $package,
    'price'   => $price,
    'subject' => $service !== '' ? 'Order: '.$label : (string) request('subject'),
    'message' => $service !== ''
        ? 'Hello BASE IT, I want to order "'.$label.'"'.($price !== '' ? ' ('.$price.')' : '').'. Please contact me with the next steps.'
        : '',
  ];
}

// Is the current request on this slug (or one of its children)?
function bactive($item){
  $current =trim(request()->path(),'/');
  $slug =$item['slug'] ?? '';
  if($slug===''){
    return $current==='';
  }
  if($current===$slug){
    return true;
  }
  foreach($item['children'] ?? [] as $child){
    if($current===$child['slug']){
      return true;
    }
  }
  return false;
}

// Clients page A–Z directory: ['groups' => [letter => [names]], 'letters' => [...], 'first' => letter]
function bclientGroups(){
  $groups = [];
  foreach (config('baseit.client_directory', []) as $name) {
    $first = strtoupper(mb_substr(ltrim($name), 0, 1));
    $key = ctype_digit($first) ? '0-9' : $first;
    $groups[$key][] = $name;
  }
  $letters = array_merge(range('A', 'Z'), ['0-9']);
  $firstLetter = null;
  foreach ($letters as $l) {
    if (!empty($groups[$l])) { $firstLetter = $l; break; }
  }
  return ['groups' => $groups, 'letters' => $letters, 'first' => $firstLetter];
}
