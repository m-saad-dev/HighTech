<?php

namespace App\Http\Controllers\admin;

use App\Facades\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $model;
    public function __construct(Service $model)
    {
        $this->middleware("permission:list-services", ['only' => ['index']]);
        $this->middleware("permission:create-service", ['only' => ['create', 'store']]);
        $this->middleware("permission:edit-service", ['only' => ['edit', 'update']]);
        $this->middleware("permission:delete-service", ['only' => ['destroy']]);
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $services = $this->model->with(['creator', 'updater'])->paginate(15);
        return view('admin.services.index')->with(
            [
                'services' => $services,
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
        $item = checkLocale('ar') ? "رأي العميل" : "The Customer Review";
        try {
            if($request->has('translations'))
                $request->replace($request->except('translations') + $request->translations);
            $service = $this->model->create($request->all());
            if ($request->has('icon')){
                $service->clearMediaCollection('icon');
                MediaHelper::uploadMedia($request, $service);
            }
            if ($request->has('mediafile')){
                $service->clearMediaCollection('images');
                $result = MediaHelper::uploadMedia($request, $service);
            }

            return redirect()->route('admin.services.index')->with('success', __('messages.created', ['item' => $item]));
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
        return view('admin.services.show')->with('service', $service);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $item = checkLocale('ar') ? "المستخدم" : "Service";
        return view('admin.services.edit')->with([
            'service' => $service,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $item = checkLocale('ar') ? "رأي العميل" : "The Customer Review";
        try {
            if($request->has('translations'))
                $request->replace($request->except('translations') + $request->translations);
            $service->update($request->all());
            if ($request->has('icon')){
                $service->clearMediaCollection('icon');
                MediaHelper::uploadMedia($request, $service);
            } else if ($request->icon_remove) {
                $service->clearMediaCollection('icon');
            }
            if ($request->has('mediafile')){
                ifRemovedIdsRemoveImages($request, $service);
                $result = MediaHelper::uploadMedia($request, $service);
            } elseif(! $request->has('mediafile')){
                ifRemovedIdsRemoveImages($request, $service);
            }
            return redirect()->route('admin.services.index')->with('success', __('messages.updated',['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.services.edit', $service->id)->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $item = checkLocale('ar') ? "رأي العميل" : "The Customer Review";
        try {
            $service->delete();
            return redirect()->route('admin.services.index')->with('success', __('messages.deleted', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.services.index')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }
}
