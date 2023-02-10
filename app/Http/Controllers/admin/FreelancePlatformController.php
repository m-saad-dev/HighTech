<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\CreateFreelancerPlatformRequest;
use App\Http\Requests\UpdateFreelancerPlatformRequest;
use App\Http\Controllers\Controller;
use App\Facades\MediaHelper;
use Illuminate\Http\Request;
use App\Models\FreelancerPlatform;

class FreelancePlatformController extends Controller
{
    private $model;
    public function __construct(FreelancerPlatform $model)
    {
        $this->middleware("permission:list-platforms", ['only' => ['index']]);
        $this->middleware("permission:create-platform", ['only' => ['create', 'store']]);
        $this->middleware("permission:edit-platform", ['only' => ['edit', 'update']]);
        $this->middleware("permission:delete-platform", ['only' => ['destroy']]);
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $platforms = $this->model->with(['creator', 'updater'])->paginate(15);
        return view('admin.freelancers_platforms.index')->with(
            [
                'platforms' => $platforms,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('admin.freelancers_platforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFreelancerPlatformRequest $request)
    {
        $item = checkLocale('ar') ? "المنصة" : "The Platform";
        try {
            $platform = $this->model->create($request->validated());
            if ($request->has('icon')){
                $platform->clearMediaCollection('icons');
                MediaHelper::uploadMedia($request, $platform);
            }
            return redirect()->route('admin.freelancers-platforms.index')->with('success', __('messages.created', ['item'
            => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.freelancers-platforms.create')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FreelancerPlatform $freelancers_platform)
    {
        return view('admin.freelancers_platforms.show')->with('platform', $freelancers_platform);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(FreelancerPlatform $freelancers_platform)
    {
        return view('admin.freelancers_platforms.edit')->with([
            'platform' => $freelancers_platform,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFreelancerPlatformRequest $request, FreelancerPlatform $freelancers_platform)
    {
        $item = checkLocale('ar') ? "المنصة" : "The Platform";
        try {
            $freelancers_platform->update($request->validated());
            if ($request->has('icon')){
                $freelancers_platform->clearMediaCollection('icons');
                MediaHelper::uploadMedia($request, $freelancers_platform);
            } else if ($request->icon_remove) {
                $freelancers_platform->clearMediaCollection('icons');
            }
            return redirect()->route('admin.freelancers-platforms.index')->with('success', __('messages.updated',['item'
            => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.freelancers-platforms.edit', $freelancers_platform->id)->with('issue_message', trans('common.issue_message', 
                    ['item' => $item]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FreelancerPlatform $freelancers_platform)
    {
        $item = checkLocale('ar') ? "المنصة" : "The Platform";
        try {
            $freelancers_platform->delete();
            return redirect()->route('admin.freelancers-platforms.index')->with('success', __('messages.deleted', ['item'
            => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.freelancers-platforms.index')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }
}
