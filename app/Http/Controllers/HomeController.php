<?php

namespace App\Http\Controllers;

use App\Helpers\HeaderGenerator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $header = HeaderGenerator::generate('Accueil','icon-home','green','Tableau de bord');

        $breadcrumbs = new stdClass;


        $user_info = Auth::user();
        //coupon
        $product_Cp=DB::table('products')->count();
        $client_Cp=DB::table('clients')->count();
        $avg_spending=DB::table('orders')->groupBy('address_id')->avg('total');

        $orders_Cp=DB::table('orders')->count();
        $orderConfirmed_Cp=DB::table('orders')->where('status','completed')->count();

        $contact_Cp=DB::table('contacts')->where('status','pending')->count();
        $contactTraite_Cp=DB::table('contacts')->where('status','done')->count();

        $product_total_confirmed_sum=DB::table('orders')->where('status','completed')->sum('total');
        $product_total_sum=DB::table('orders')->sum('total');

        $result="";

        $last_month=DB::table('orders')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->where('status','completed')->count();
        $this_month=DB::table('orders')->whereMonth('created_at',date('m'))->where('status','completed')->count();
        if($last_month > $this_month){
            $result = "Négative";

        }elseif($last_month < $this_month){
            $result = "Positive";

        }elseif($last_month == $this_month){
            $result = "egalite";

        }

        return view('home',compact(['avg_spending','product_total_sum','product_total_confirmed_sum','breadcrumbs','user_info','product_Cp','client_Cp','orders_Cp','orderConfirmed_Cp','contactTraite_Cp','contact_Cp',
            'result'
        ]))->with(['page_title' => 'Accueil', 'header' => $header]);
    }
}
