<?php

namespace App\Http\Controllers\admin;

use App\Facades\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\throwException;

class StaffController extends Controller
{
    private $staffRepository;
    public function __construct(Staff $model)
    {
        $this->middleware("permission:list-staff", ['only' => ['index']]);
        $this->middleware("permission:create-staff", ['only' => ['create', 'store']]);
        $this->middleware("permission:edit-staff", ['only' => ['edit', 'update']]);
        $this->middleware("permission:delete-staff", ['only' => ['destroy']]);
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $staff = $this->model->with(['creator', 'updater'])->paginate(15);
        return view('admin.staff.index')->with(
            [
                'staff' => $staff,
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
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStaffRequest $request)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The Staff";
        try {
            $staff = $this->model->create($request->validated());
            if ($request->has('avatar')){
                $staff->clearMediaCollection('avatars');
                MediaHelper::uploadMedia($request, $staff);
            }
            return redirect()->route('admin.staff.index')->with('success', __('messages.created', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.staff.create')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        return view('admin.staff.show')->with('staff', $staff);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $item = checkLocale('ar') ? "المستخدم" : "Staff";
        return view('admin.staff.edit')->with([
            'staff' => $staff,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffRequest $request, Staff $staff)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The Staff";
        try {
            $staff->update($request->validated());
            if ($request->has('avatar')){
                $staff->clearMediaCollection('avatars');
                MediaHelper::uploadMedia($request, $staff);
            }
            return redirect()->route('admin.staff.index')->with('success', __('messages.updated',['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.staff.edit', $staff->id)->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The Staff";
        try {
            $staff->delete();
            return redirect()->route('admin.staff.index')->with('success', __('messages.deleted', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.staff.index')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }
}
