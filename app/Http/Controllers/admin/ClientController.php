<?php

namespace App\Http\Controllers\admin;

use App\Facades\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use function PHPUnit\Framework\throwException;

class ClientController extends Controller
{
    private $clientRepository;
    public function __construct(Client $model)
    {
        $this->middleware("permission:list-clients", ['only' => ['index']]);
        $this->middleware("permission:create-client", ['only' => ['create', 'store']]);
        $this->middleware("permission:edit-client", ['only' => ['edit', 'update']]);
        $this->middleware("permission:delete-client", ['only' => ['destroy']]);
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $clients = $this->model->with(['creator', 'updater'])->paginate(15);
        return view('admin.clients.index')->with(
            [
                'clients' => $clients,
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
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The Client";
//        try {
            $client = $this->model->create($request->validated());
            if ($request->has('avatar')){
                $client->clearMediaCollection('avatars');
                MediaHelper::uploadMedia($request, $client);
            }
            return redirect()->route('admin.clients.index')->with('success', __('messages.created', ['item' => $item]));
//        } catch (\Exception $e) {
//            return redirect()->route('admin.clients.create')->with('issue_message', trans('common.issue_message', ['item' => $item]));
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.clients.show')->with('client', $client);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit')->with([
            'client' => $client,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The Client";
        try {
            $client->update($request->validated());
            if ($request->has('avatar')){
                $client->clearMediaCollection('avatars');
                MediaHelper::uploadMedia($request, $client);
            } else if ($request->avatar_remove) {
                $client->clearMediaCollection('avatars');
            }
            return redirect()->route('admin.clients.index')->with('success', __('messages.updated',['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.clients.edit', $client->id)->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $item = checkLocale('ar') ? "المستخدم" : "The Client";
        try {
            $client->delete();
            return redirect()->route('admin.clients.index')->with('success', __('messages.deleted', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.clients.index')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }
}
