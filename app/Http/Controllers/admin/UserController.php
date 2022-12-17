<?php

namespace App\Http\Controllers\admin;

use App\Facades\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\throwException;

class UserController extends Controller
{
    private $userRepository;
    public function __construct(User $model)
    {
        $this->middleware("permission:list-users|force-list-users", ['only' => ['index']]);
        $this->middleware("permission:create-user", ['only' => ['create', 'store']]);
        $this->middleware("permission:edit-user", ['only' => ['edit', 'update']]);
        $this->middleware("permission:delete-user", ['only' => ['destroy']]);
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->can('force-list-users')){
            $users = $this->model->with(['creator', 'updater'])->paginate(15);
        } else if (auth()->user()->can('list-users')){
            $users = auth()->user()->children()->with(['creator', 'updater'])->paginate(15);
        }
        return view('admin.users.index')->with(
            [
                'users' => $users,
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
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The User";
        try {
            $user = $this->model->create($request->validated());
            $user->assignRole([$request->role]);
            if ($request->has('avatar')){
                $user->clearMediaCollection('avatars');
                MediaHelper::uploadMedia($request, $user);
            }
            return redirect()->route('admin.users.index')->with('success', __('messages.created', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.users.create')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $item = checkLocale('ar') ? "المستخدم" : "User";
        if (!auth()->user()->can('Super Admin') && $user->can('Super Admin')) {
            return redirect()->route('admin.users.index')->with('issue_message', trans('common.issue_message_editUser', ['item' => $item]));
        }
        return view('admin.users.edit')->with([
            'user' => $user,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The User";
        try {
            $user = $this->model->where('id', $id)->first();
            if (!auth()->user()->can('Super Admin') && $user->can('Super Admin')) {
                throwException(trans('common.issue_message_editUser', ['item' => $item]));
            }
            $user->update($request->validated());
            $user->syncRoles([$request->role ?? $user->roles]);

            if ($request->has('avatar')){
                $user->clearMediaCollection('avatars');
                $dd = MediaHelper::uploadMedia($request, $user);
            } else if ($request->avatar_remove) {
                $user->clearMediaCollection('avatars');
            }
            return redirect()->route('admin.users.index')->with('success', __('messages.updated',['item' => $item]));
                    } catch (\Exception $e) {
            return redirect()->route('admin.users.edit', $user->id)->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The User";
        try {
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', __('messages.deleted', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.users.index')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    public function myProfile(){
        return view('admin.users.my_profile')->with(['data' => auth()->user()]);
    }
}
