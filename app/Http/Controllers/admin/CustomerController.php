<?php

namespace App\Http\Controllers\admin;

use App\Facades\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\CustomerTranslation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\throwException;

class CustomersController extends Controller
{
    private $customerRepository;
    private $translationModel;
    public function __construct(Customer $model, CustomerTranslation $translationModel)
    {
        $this->middleware("permission:list-customers", ['only' => ['index']]);
        $this->middleware("permission:create-customer", ['only' => ['create', 'store']]);
        $this->middleware("permission:edit-customer", ['only' => ['edit', 'update']]);
        $this->middleware("permission:delete-customer", ['only' => ['destroy']]);
        $this->model = $model;
        $this->translationModel = $translationModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $customer = $this->model->with(['creator', 'updater'])->paginate(15);
        return view('admin.customers.index')->with(
            [
                'customer' => $customer,
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
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomerRequest $request)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The Customer";
        try {
            if($request->has('translations'))
                $request->replace($request->except('translations') + $request->translations);
            $customer = $this->model->create($request->all());
            if ($request->has('avatar')){
                $customer->clearMediaCollection('avatars');
                MediaHelper::uploadMedia($request, $customer);
            }
            return redirect()->route('admin.customers.index')->with('success', __('messages.created', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.customers.create')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('admin.customers.show')->with('customer', $customer);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $item = checkLocale('ar') ? "المستخدم" : "Customer";
        return view('admin.customers.edit')->with([
            'customer' => $customer,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The Customer";
        try {
            if($request->has('translations'))
                $request->replace($request->except('translations') + $request->translations);
            $customer->update($request->all());
            if ($request->has('avatar')){
                $customer->clearMediaCollection('avatars');
                MediaHelper::uploadMedia($request, $customer);
            } else if ($request->avatar_remove) {
                $customer->clearMediaCollection('avatars');
            }
            return redirect()->route('admin.customers.index')->with('success', __('messages.updated',['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.customers.edit', $customer->id)->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The Customer";
        try {
            $customer->delete();
            return redirect()->route('admin.customers.index')->with('success', __('messages.deleted', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.customers.index')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }
}
