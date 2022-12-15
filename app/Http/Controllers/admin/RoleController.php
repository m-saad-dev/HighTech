<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    private $roleRepository;
    public function __construct(Role $model)
    {
        $this->middleware("permission:list-roles|force-list-roles", ['only' => ['index']]);
        $this->middleware("permission:create-role", ['only' => ['create', 'store']]);
        $this->middleware("permission:edit-role", ['only' => ['edit', 'update']]);
        $this->middleware("permission:delete-role", ['only' => ['destroy']]);
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->can('force-list-roles')){
            $roles = $this->model->with(['creator', 'updater'])->paginate(15);
        } else if (auth()->user()->can('list-roles')){
            $roles = $this->model->with(['creator', 'updater'])->whereHas('users', function ($query){
                $query->where('id', auth()->id());
            })->paginate(15);
        }
        return view('admin.roles.index')->with(
            [
                'roles' => $roles,
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
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        $item = checkLocale('ar') ? "الصلاحية" : "The Role";
//        try {

            $role = $this->model->create($request->validated());
            $role->syncPermissions($request->selected);
            return redirect()->route('admin.roles.index')->with('success', __('messages.created',['item' => $item]));
//        } catch (\Exception $e) {
//            return redirect()->route('admin.roles.create')->with('issue_message', trans('common.issue_message', ['item' => $item]));
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show')->with(['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit')->with([
            'role' => $role,
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
        $item = checkLocale('ar') ? "الصلاحية" : "The Role";
        try {
            $role = $this->model->where('id', $id);
            $role->update($request->validated());
            $role->first()->syncPermissions($request->selected);
            return redirect()->route('admin.roles.index')->with('success', __('messages.updated',['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.roles.edit', $role->first()->id)->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(role $role)
    {
        $item = checkLocale('ar') ? "الصلاحية" : "The Role";
        try {
            $role->delete();
            return redirect()->route('admin.roles.index')->with('success', __('messages.deleted', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.roles.index')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }
}
