<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Order;
use App\Models\Quote;
use GuzzleHttp\Client;
use App\Models\CarYear;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view('front.index');
    }

    public function about() {
        return view('front.about');
    }

    public function contact() {
        return view('front.contact');
    }

    public function how_it_works() {
        return view('front.how');
    }

    public function faqs() {
        return view('front.faqs');
    }

    public function terms() {
        return view('front.terms');
    }

    public function place_order_page() {
        return view('front.place-order.index');
    }
    public function place_order_car() {
        $years = CarYear::orderBy('year', 'DESC')->get();
        return view('front.place-order.car', compact('years'));
    }
    public function place_order_motorcycle() {
        $years = CarYear::orderBy('year', 'DESC')->get();
        return view('front.place-order.motorcycle', compact('years'));
    }
    public function place_order_rv() {
        $years = CarYear::orderBy('year', 'DESC')->get();
        return view('front.place-order.rv', compact('years'));
    }
    public function place_order_boat() {
        $years = CarYear::orderBy('year', 'DESC')->get();
        return view('front.place-order.boat', compact('years'));
    }
    public function place_order_atv() {
        $years = CarYear::orderBy('year', 'DESC')->get();
        return view('front.place-order.atv', compact('years'));
    }
    public function place_order_heavy() {
        $years = CarYear::orderBy('year', 'DESC')->get();
        return view('front.place-order.heavy', compact('years'));
    }

    public function thank_you() {
        return view('front.thankyou');
    }

    public function customer_login_page() {
        if(!auth('customer')->check()) {
            return view('front.customer.login');
        }else {
            return redirect()->route('customer_account');
        }
    }
    public function account() {
        return view('front.customer.account.index');
    }
    public function account_details() {
        return view('front.customer.account.details');
    }
    public function orders() {
        $leads = Lead::where('customer_id', auth('customer')->user()->id)->get();
        $quotes = Quote::all();
        $orders = Order::all();
        return view('front.customer.account.orders', compact('leads', 'quotes', 'orders'));
    }

}
