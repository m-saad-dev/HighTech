<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    private $roleRepository;
    public function __construct(Role $model)
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
        $roles = $this->model->paginate(15);
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
        try {
            $role = $this->model->create($request->validated());
            $role->syncPermissions($request->selected);
            return redirect()->route('admin.roles.index')->with('created', __('messages.New role Created'));
        } catch (\Exception $e) {
            return redirect()->route('admin.roles.create')->with('issue_message', trans('common.issue_message', ['item' => "role"]));
        }
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
        try {
            $role = $this->model->where('id', $id);
            $role->update($request->validated());
            $role->first()->syncPermissions($request->selected);
            return redirect()->route('admin.roles.index')->with('created', __('roles.New role Created'));
        } catch (\Exception $e) {
            return redirect()->route('admin.roles.edit', $role->first()->id)->with('issue_message', trans('common.issue_message', ['item' => "role"]));
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
        try {
            $deleted = $role->delete();
            if ($deleted){
                return redirect()->route('admin.roles.index')->with('deleted', __('roles.roleDeleted'));
            } else {
                return redirect()->route('admin.roles.index')->withErrors('deleted', __('roles.roleNotDeleted'));
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.roles.edit')->with('issue_message', trans('common.issue_message', ['item' => "role"]));
        }
    }
}
