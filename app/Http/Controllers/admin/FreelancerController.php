<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\CreateFreelancerRequest;
use App\Http\Requests\UpdateFreelancerRequest;
use App\Http\Controllers\Controller;
use App\Facades\MediaHelper;
use Illuminate\Http\Request;
use App\Models\Freelancer;

class FreelancerController extends Controller
{
    private $model;
    public function __construct(Freelancer $model)
    {
        $this->middleware("permission:list-freelancers", ['only' => ['index']]);
        $this->middleware("permission:create-freelancer", ['only' => ['create', 'store']]);
        $this->middleware("permission:edit-freelancer", ['only' => ['edit', 'update']]);
        $this->middleware("permission:delete-freelancer", ['only' => ['destroy']]);
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $freelancers = $this->model->with(['creator', 'updater'])->paginate(15);
        return view('admin.freelancers.index')->with(
            [
                'freelancers' => $freelancers,
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
        return view('admin.freelancers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFreelancerRequest $request)
    {
        $item = checkLocale('ar') ? "المستقل" : "The Freelancer";
        try {
            $freelancer = $this->model->create($request->validated());
            return redirect()->route('admin.freelancers.index')->with('success', __('messages.created', ['item' => 
                    $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.freelancers.create')->with('issue_message', trans('common.issue_message', 
                    ['item' 
            => $item]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Freelancer $freelancer)
    {
        return view('admin.freelancers.show')->with('freelancer', $freelancer);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Freelancer $freelancer)
    {
        return view('admin.freelancers.edit')->with([
            'freelancer' => $freelancer,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFreelancerRequest $request, Freelancer $freelancer)
    {
        $item = checkLocale('ar') ? "المستقل" : "The Freelancer";
        try {
            $freelancer->update($request->validated());
            return redirect()->route('admin.freelancers.index')->with('success', __('messages.updated',['item' => 
                    $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.freelancers.edit', $freelancer->id)->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Freelancer $freelancer)
    {
        $item = checkLocale('ar') ? "المستقل" : "The Freelancer";
        try {
            $freelancer->delete();
            return redirect()->route('admin.freelancers.index')->with('success', __('messages.deleted', ['item' => 
                    $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.freelancers.index')->with('issue_message', trans('common.issue_message', 
                    ['item' 
            => $item]));
        }
    }
}
