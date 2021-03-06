<?php

namespace App\Http\Controllers\Front;

use App\Address;
use App\Chocolate;
use App\ChocolateCategory;
use App\Corporate;
use App\Country;
use App\Customer;
use App\Flower;
use App\FlowerCategory;
use App\Gift;
use App\Http\Controllers\Controller;
use App\Mail\ContactEnquiry;
use App\Mail\CorporateEnquiry;
use App\ShippingMethod;
use App\ShippingZone;
use App\WishList;
use Cart;
use Hash;
use Illuminate\Http\Request;
use Mail;
use \Session;

class ArabicHomePageController extends Controller
{
    public function index()
    {
        return view('frontend_ar.home');
    }
    public function about()
    {
        return view('frontend_ar.about');
    }

    public function flowers()
    {
        $flowers = Flower::all();
        $flowerCategories = FlowerCategory::all();
        return view('frontend_ar.flowers', compact('flowers', 'flowerCategories'));
    }

    public function flowersByCategory($slug)
    {
        $flowers = FlowerCategory::where('slug', $slug)->firstOrFail()->flowers;
        $flowerCategories = FlowerCategory::all();
        return view('frontend_ar.flowers', compact('flowers', 'flowerCategories'));
    }

    public function chocolates()
    {
        $chocolates = Chocolate::all();
        $chocolateCategories = ChocolateCategory::all();
        return view('frontend_ar.chocolates', compact('chocolates', 'chocolateCategories'));
    }

    public function chocolatesByCategory($slug)
    {
        $chocolates = ChocolateCategory::where('slug', $slug)->firstOrFail()->chocolates;
        $chocolateCategories = ChocolateCategory::all();
        return view('frontend_ar.chocolates', compact('chocolates', 'chocolateCategories'));
    }

    public function giftWrapping()
    {
        $gifts = Gift::all();
        return view('frontend_ar.giftWrapping', compact('gifts'));
    }

    public function addFlowerToWishList(Request $request)
    {
        $wishlist = new WishList();
        $wishlist->product_id = $request->flowerId;
        $wishlist->product_type = 'flower';
        $wishlist->user_id = auth()->guard('customer')->user()->id;
        $wishlist->save();
        return Flower::find($request->flowerId);
    }

    public function addChocolateToWishList(Request $request)
    {
        $wishlist = new WishList();
        $wishlist->product_id = $request->chocolateId;
        $wishlist->product_type = 'chocolate';
        $wishlist->user_id = auth()->guard('customer')->user()->id;
        $wishlist->save();
        return Chocolate::find($request->chocolateId);
    }

    public function account()
    {
        $customer = auth()->guard('customer')->user();
        $wishlists = $customer->wishlist;
        $addresses = $customer->addresses;
        $myorders = $customer->orders()->orderBy('created_at', 'desc')->get();
        return view('frontend_ar.account', compact('customer', 'wishlists', 'addresses', 'myorders'));
    }

    public function register()
    {
        return view('frontend_ar.register');
    }

    public function checkout()
    {
        $cart = Cart::getContent();
        $shipping = null;
        $billing = null;
        if ($cart->count() > 0) {
            if (Session::has('token_id')) {
                $customer = Customer::find(session('token_id'));
                if (is_null($customer)) {
                    $shipping = null;
                    $billing = null;
                } else {
                    $shipping = $customer->getDefaultAddress();
                    $billing = $customer->getDefaultAddress();
                    if ($customer->getDefaultAddress() == null) {
                        $shipping = new Address();
                        $shipping->first_name = $customer->first_name;
                        $shipping->last_name = $customer->last_name;
                        $shipping->email = $customer->email;
                        $shipping->phone = $customer->phone;
                        $billing = $shipping;
                    }
                }

            }
        } else {
            return redirect('/');
        }
        $shippingCharge = env('SHIPPING_CHARGE', 0);
        $countries = Country::all();
        $shippingZones = ShippingZone::all();
        $shippingMethods = ShippingMethod::all();
        return view('frontend_ar.checkout', compact(['cart', 'shipping', 'billing', 'shippingCharge', 'countries', 'shippingMethods', 'shippingZones']));
    }

    public function saveAddress($data)
    {
        $shippingAddress = Address::create($data);
        session(['sid' => $shippingAddress->id]);
        if (isset($data['sameAsShipping']) && $data['sameAsShipping'] == "on") {
            session(['bid' => $shippingAddress->id]);
        } else {
            $billingAddress = Address::create([
                'firstname' => $data["billing_first_name"],
                'lastname' => $data["billing_last_name"],
                'address1' => $data["billing_address1"],
                'address2' => $data["billing_address2"],
                'city' => $data["billing_city"],
                'country' => $data["billing_country"],
                'phone' => $data["billing_phone"],
                'email' => $data["billing_email"],
            ]);
            session(['bid' => $billingAddress->id]);
        }
        return $shippingAddress;
    }
    public function saveCustomer($data)
    {
        $data['password'] = Hash::make(str_random(40));
        $customer = Customer::create($data);
        session(['token_id' => $customer->id]);
        $data['custormer_id'] = $customer->id;
        $this->saveAddress($data);
        return $customer;
    }

    public function cart()
    {
        return view('frontend_ar.cart');
    }
    public function getCart()
    {
        return ['contents' => Cart::getContent(), 'subTotal' => Cart::getSubTotal()];
    }

    public function addFlowerToCart(Request $request)
    {
        $price = $request->size == "small" ? $request->small_price : $request->big_price;
        Cart::add($request->flowerId . "-" . $request->size, $request->flower, $price, $request->quantity, ['type' => 'flower', 'size' => $request->size, 'image' => $request->image, 'note' => $request->note, 'id' => $request->flowerId]);
        return Cart::get($request->flowerId . "-" . $request->size);
    }

    public function addChocolateToCart(Request $request)
    {
        $price = 0;
        $size = "";
        if ($request->size == "full") {
            $price = $request->full_price;
            $size = '1 KG';
        } elseif ($request->size == "half") {
            $price = $request->half_price;
            $size = '1/2 KG';
        } else {
            $price = $request->quarter_price;
            $size = '1/4 KG';
        }
        Cart::add($request->chocolateId . "-" . $request->size, $request->chocolate, $price, $request->quantity, ['type' => 'chocolate', 'size' => $size, 'size_name' => $request->size, 'image' => $request->image, 'note' => $request->note, 'id' => $request->chocolateId]);
        return Cart::get($request->chocolateId . "-" . $request->size);
    }

    public function removeFromCart(Request $request)
    {
        Cart::remove($request->cartId);
        return Cart::getSubTotal();
    }

    public function wishlisttocart(Request $request)
    {
        $wishlist = WishList::find($request->wishlistId);
        if ($wishlist->product_type == 'flower') {
            $flower = $wishlist->product;
            $image = $flower->getMedia('images')->first() != null ? $flower->getMedia('images')->first()->getUrl() : '';
            if ($wishlist->product->small_price) {
                Cart::add($wishlist->product_id . "-small", $flower->title, $flower->small_price, 1, ['type' => 'flower', 'size' => 'small', 'image' => $image, 'id' => $flower->id]);
                return Cart::get($wishlist->product_id . "-small");
            } else {
                Cart::add($wishlist->product_id . "-big", $flower->title, $flower->big_price, 1, ['type' => 'flower', 'size' => 'big', 'image' => $image, 'id' => $flower->id]);
                return Cart::get($wishlist->product_id . "-big");
            }
        }

        if ($wishlist->product_type == 'chocolate') {
            $chocolate = $wishlist->product;
            $image = $chocolate->getMedia('images')->first() != null ? $chocolate->getMedia('images')->first()->getUrl() : '';
            Cart::add($wishlist->product_id . "-full", $chocolate->title, $chocolate->full_price, 1, ['type' => 'chocolate', 'size' => '1 KG', 'size_name' => "full", 'image' => $image, 'id' => $chocolate->id]);
            return Cart::get($wishlist->product_id . "-full");
        }
    }

    public function updatequantity(Request $request)
    {
        $quantity = 0;
        if ($request->quantity > Cart::get($request->cartId)->quantity) {
            $quantity = 1;
        }
        if ($request->quantity < Cart::get($request->cartId)->quantity) {
            $quantity = -1;
        }

        Cart::update($request->cartId, array(
            'quantity' => $quantity,
        ));
        return Cart::getSubTotal();
    }

    public function contact()
    {
        return view('frontend_ar.contact');
    }

    public function contactEnquiry(Request $request)
    {
        Mail::to(ContactEnquiry::getDestinationEmail())
            ->send(new ContactEnquiry($request));

        // return view('frontend_ar.email.contact-enquiry')->with(['request'=> $request]);
        if (count(Mail::failures()) > 0) {
            return response()->json(["status" => "failed"]);

        } else {
            return response()->json(["status" => "success"]);
        }
    }

    public function corporate()
    {
        return view('frontend_ar.corporate');
    }

    public function corporateEnquiry(Request $request)
    {
        $corporate = Corporate::create($request->all());
        Mail::to(CorporateEnquiry::getDestinationEmail())
            ->send(new CorporateEnquiry($request));

        // return view('frontend_ar.email.corporate-enquiry')->with(['request'=> $request]);
        if (count(Mail::failures()) > 0) {
            return response()->json(["status" => "failed"]);

        } else {
            return response()->json(["status" => "success"]);
        }
    }

}
