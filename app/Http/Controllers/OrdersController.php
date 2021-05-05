<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Modules\Admin\Models\Advertisement;
use Modules\Admin\Models\News;
use Modules\Admin\Models\client;
use Modules\Admin\Models\Order;
use Modules\Admin\Models\OrderImage;
use Modules\Admin\Models\Disease;
use Carbon\Carbon;
use App\Http\Requests\OrderRequest;
use Module ;
class OrdersController extends Controller
{
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clientOrders ()
    {   
        $mainPageTitle = 'orders' ;
        $orders = Order::where('clients_id',auth('client')->user()->clients_id)->get();
        return view('front.orders.client_orders',compact('mainPageTitle','orders'));
    }

      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function doctorOrders ()
    {   
        $mainPageTitle = 'orders' ;
        $orders = Order::where('doctors_id',auth('doctor')->user()->doctors_id)->get();
        return view('front.orders.doctor_orders',compact('mainPageTitle','orders'));
    }

      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function doctorFollowingOrders ()
    {   
        $mainPageTitle = 'following_orders' ;
        $orders = Order::where('orders_doctor_following',auth('doctor')->user()->doctors_id)->get();
        return view('front.orders.doctor_orders',compact('mainPageTitle','orders'));
    }

    public function addOrder()
    {   
        $diseases = Disease::active()->get();
        $client  = auth('client')->user();
        $mainPageTitle = 'orders' ;
        return view('front.orders.add_order',compact('mainPageTitle','diseases','client'));
    }

    public function editOrder(Order $order)
    {   
        $mainPageTitle = 'orders' ;
        return view('front.orders.edit_order',compact('mainPageTitle','order'));
    }
    public function save(OrderRequest $request)
    {   
        $order = Order::create($request->all());
        foreach($request->order_images as $image){
            $order_image = new OrderImage ;
            $order_image->orders_id = $order->orders_id ;
            $order_image->orders_img = $image ;
            $order_image->save() ;
        }
        $mainPageTitle = 'orders' ;
        return redirect()->route('orders.client_orders')->with('status', __('admin::lang.orderCreated'));
        
    }

    public function update(Request $request ,Order $order)
    {   
        $order->update($request->all());
        return redirect()->back()->with('status', __('admin::lang.orderUpdated'));
        
    }

    public function show(Order $order)
    {   
         
        $mainPageTitle = 'orders' ;
        return view('front.orders.show',compact('mainPageTitle','order'));
    }
     
}
