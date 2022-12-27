<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(): \Illuminate\Contracts\Support\Renderable
    {
        $oldOrders = Order::orderByDesc('created_at')->paginate(10);
        return view('admin.dashboard')->with([
            'oldOrders' => $oldOrders,
        ]);
    }

}
