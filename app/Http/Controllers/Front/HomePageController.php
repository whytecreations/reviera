<?php

namespace App\Http\Controllers\Front;

use App\Flower;

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
        return view('frontend.flowers',compact('flowers'));
    }
    public function chocolates(){
        return view('frontend.chocolates');
    }
    public function giftWrapping(){
        return view('frontend.giftWrapping');
    }
    public function account(){
        return view('frontend.account');
    }
    public function login(){
        return view('frontend.login');
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
