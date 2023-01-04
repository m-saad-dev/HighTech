<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Client;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Staff;
use App\Models\User;
use App\Notifications\OrderNotification;
use App\Events\OrderNotification as OrderNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
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
    public function index(Request $request)
    {
        $aboutUsElement = Setting::where('key', 'about_us')->first();
        $aboutUs = json_decode($aboutUsElement->value, true);
        $linksElement = Setting::where('key', 'links')->first();
        $links = json_decode($linksElement->value, true);
        $services = Service::limit(5)->get();
        $articles = Article::limit(5)->get();
        $clients = Client::get();
        $customers = Customer::get();
        $staff = Staff::get();
        $serviceId = $request->service_id;
        return view('website.home')->with([
            'aboutUs' => $aboutUs,
            'links' => $links,
            'services' => $services,
            'articles' => $articles,
            'clients' => $clients,
            'customers' => $customers,
            'staff' => $staff,
            'serviceId' => $serviceId,
        ]);
    }

    public function service(Service $service){
        return view('website.services')->with([
            'service' => $service,
        ]);
    }

    public function staff(){
        $staff = Staff::all();
        return view('website.staff')->with([
            'staff' => $staff,
        ]);
    }

    public function blog(){
        $blog = Article::orderByDesc('created_at')->limit(10)->get();
        return view('website.blog')->with([
            'blog' => $blog,
        ]);
    }

    public function clients(){
        $clients = Article::all();
        return view('website.clients')->with([
            'clients' => $clients,
        ]);
    }

    public function article(Article $article){
        return view('website.article_show')->with([
            'article' => $article,
        ]);
    }

    public function orderStore(Request $request){
        $item = 'المستخدم';
        try {
            $validated = $request->validate([
                'name' => 'required|string',
                'business_type' => 'required|string',
                'phone_number' => 'required|string',
                'service_id' => 'required|int',
            ]);

            $order = Order::create($validated);
            if ($order){
                $users = User::permission('user-notifications')->get();
                $data = [
                    'id' => $order->id,
                    'name' => $order->name,
                    'business_type' => $order->business_type,
                    'phone_number' => $order->phone_number,
                    'service_title' => $order->serviceTitle,
                ];
                Notification::send($users, new OrderNotification($order));

                event(new OrderNotify($data));
            }
            return redirect()->back()->with('success', __('messages.created', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->back()->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }
}
