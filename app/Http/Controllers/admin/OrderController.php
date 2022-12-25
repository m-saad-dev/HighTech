<?php

namespace App\Http\Controllers\admin;

use App\Facades\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use function PHPUnit\Framework\throwException;

class OrderController extends Controller
{
    private $model;
    public function __construct(Order $model)
    {
        $this->middleware("permission:list-orders", ['only' => ['index']]);
        $this->middleware("permission:create-order", ['only' => ['create', 'store']]);
        $this->middleware("permission:edit-order", ['only' => ['edit', 'update']]);
        $this->middleware("permission:delete-order", ['only' => ['destroy']]);
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $orders = $this->model->with(['creator', 'updater'])->paginate(15);
        return view('admin.orders.index')->with(
            [
                'orders' => $orders,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The Order";
        try {
            $order = $this->model->create($request->validated());
            if ($order){
                $data = [
                    'order_id' => $order->id,
                ];
                event(new OrderNotification($data));
            }
            return redirect()->route('admin.orders.index')->with('success', __('messages.created', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.orders.create')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show')->with('order', $order);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit')->with([
            'order' => $order,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The Order";
        try {
            $order->update($request->validated());
            if ($request->has('avatar')){
                $order->clearMediaCollection('avatars');
                MediaHelper::uploadMedia($request, $order);
            } else if ($request->avatar_remove) {
                $order->clearMediaCollection('avatars');
            }
            return redirect()->route('admin.orders.index')->with('success', __('messages.updated',['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.orders.edit', $order->id)->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The Order";
        try {
            $order->delete();
            return redirect()->route('admin.orders.index')->with('success', __('messages.deleted', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.orders.index')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }
}
