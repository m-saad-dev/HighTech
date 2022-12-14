<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ServiceController extends Controller
{
    private $serviceRepository;
    public function __construct(Service $model)
    {
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = $this->model->paginate(15);
        return view('admin.services.index')->with(
            [
                'services' => $services,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServiceRequest $request)
    {
        $item = checkLocale('ar') ? "الصلاحية" : "The Service";
        try {
            $service = $this->model->create($request->validated());
            $service->syncPermissions($request->selected);
            return redirect()->route('admin.services.index')->with('success', __('messages.created',['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.services.create')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('admin.services.show')->with(['role' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit')->with([
            'role' => $service,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateroleRequest $request, $id)
    {
        $item = checkLocale('ar') ? "الصلاحية" : "The Service";
        try {
            $service = $this->model->where('id', $id);
            $service->update($request->validated());
            $service->first()->syncPermissions($request->selected);
            return redirect()->route('admin.services.index')->with('success', __('messages.updated',['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.services.edit', $service->first()->id)->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(role $service)
    {
        $item = checkLocale('ar') ? "الصلاحية" : "The Service";
        try {
            $service->delete();
            return redirect()->route('admin.services.index')->with('success', __('messages.deleted', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.services.index')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }
}
