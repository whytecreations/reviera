<?php

namespace App\Http\Controllers\Front;

use App\Flower;
use App\FlowerCategory;
use App\Chocolate;
use App\ChocolateCategory;

use Cart;
use Mail;
use App\Mail\ContactEnquiry;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomePageController extends Controller
{
    public function index(){
        return view('frontend.home');
    }
    public function about(){
        return view('frontend.about');
    }
    public function flowers(){
        $flowers=Flower::all();
        $flowerCategories=FlowerCategory::all();
        return view('frontend.flowers',compact('flowers','flowerCategories'));
    }
    
    public function flowersByCategory($slug){
        $flowers=FlowerCategory::where('slug',$slug)->firstOrFail()->flowers;
        $flowerCategories=FlowerCategory::all();
        return view('frontend.flowers',compact('flowers','flowerCategories'));
    }

    public function chocolates(){
        $chocolates=Chocolate::all();
        $chocolateCategories=ChocolateCategory::all();
        return view('frontend.chocolates',compact('chocolates','chocolateCategories'));
    }

    public function chocolatesByCategory($slug){
        $chocolates=ChocolateCategory::where('slug',$slug)->firstOrFail()->chocolates;
        $chocolateCategories=ChocolateCategory::all();
        return view('frontend.chocolates',compact('chocolates','chocolateCategories'));
    }

    public function giftWrapping(){
        return view('frontend.giftWrapping');
    }
    public function account(){
        return view('frontend.account');
    }
    
    public function register(){
        return view('frontend.register');
    }
    public function checkout(){
        return view('frontend.checkout');
    }
    public function cart(){
        return view('frontend.cart');
    }

    public function addFlowerToCart(Request $request ){
        $price =$request->size=="small"?$request->small_price:$request->big_price;
        Cart::add($request->flowerId."-".$request->size, $request->flower,$price, $request->quantity,['type'=>'flower','size'=>$request->size,'image'=>$request->image,'note'=>$request->note]);
        return "added";
    }
    
    public function addChocolateToCart(Request $request ){
        $price =0;
        $size="";
        if($request->size=="full"){
            $price=$request->full_price;
            $size='1 KG';
        }
        elseif($request->size == "half"){
            $price=$request->half_price;
            $size='1/2 KG';
        }else{
            $price=$request->quarter_price;
            $size='1/4 KG';
        }
        Cart::add($request->chocolateId."-".$request->size, $request->chocolate,$price, $request->quantity,['type'=>'chocolate','size'=>$size,'size_name'=>$request->size, 'image'=>$request->image,'note'=>$request->note]);
        return "added";
    }

    public function removeFromCart(Request $request ){
        Cart::remove($request->cartId);
        return Cart::getSubTotal();
    }
    
    public function updatequantity(Request $request ){
        $quantity = 0;
        if($request->quantity > Cart::get($request->cartId)->quantity){
            $quantity = 1;
        }
        if($request->quantity < Cart::get($request->cartId)->quantity){
            $quantity = -1;
        }
        
        Cart::update($request->cartId, array(
            'quantity' => $quantity,
          ));
        return Cart::getSubTotal();
    }



    public function contact(){
        return view('frontend.contact');
    }
    public function contactEnquiry(Request $request){
        Mail::to(ContactEnquiry::getDestinationEmail())
        ->send(new ContactEnquiry($request));
      
        // return view('frontend.email.contact-enquiry')->with(['request'=> $request]);
        if( count(Mail::failures()) > 0 ) {
          return response()->json(["status"=>"failed"]);
        } else {
          return response()->json(["status"=>"success"]);
        }
      }

}
