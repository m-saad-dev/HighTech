<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\CreateFreelanceContractRequest;
use App\Http\Requests\UpdateFreelanceContractRequest;
use App\Http\Controllers\Controller;
use App\Facades\MediaHelper;
use Illuminate\Http\Request;
use App\Models\FreelanceContract;

class FreelanceContractController extends Controller
{
    private $model;
    public function __construct(FreelanceContract $model)
    {
        $this->middleware("permission:list-freelance-contracts", ['only' => ['index']]);
        $this->middleware("permission:create-freelance-contract", ['only' => ['create', 'store']]);
        $this->middleware("permission:edit-freelance-contract", ['only' => ['edit', 'update']]);
        $this->middleware("permission:delete-freelance-contract", ['only' => ['destroy']]);
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $freelance_contracts = $this->model->with(['creator', 'updater'])->paginate(15);
        return view('admin.freelance_contracts.index')->with(
            [
                'contracts' => $freelance_contracts,
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
        return view('admin.freelance_contracts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFreelanceContractRequest $request)
    {
        $item = checkLocale('ar') ? "عقد العمل الحر" : "The FreelanceContract";
//        try {
            $freelance_contract = $this->model->create($request->validated());
            if ($request->has('image')){
                if (key_exists('logo', $request->image)){
                    MediaHelper::uploadMedia(new Request(['logo' => $request->image['logo']]), $freelance_contract);
                }
                if (key_exists('info', $request->image)){
                    MediaHelper::uploadMedia(new Request(['image' => $request->image['info']]), $freelance_contract);
                }
            }
            if ($request->has(['freelancers'])){
                $freelancers = array_map(function ($freelancer){
                    return $freelancer + ['order' => 1];
                },$request->freelancers);
                $freelance_contract->freelancers()->sync($freelancers);
            }
            return redirect()->route('admin.freelance-contracts.index')->with('success', __('messages.created', ['item' => $item]));
//        } catch (\Exception $e) {
//            return redirect()->route('admin.freelance-contracts.create')->with('issue_message', trans('common.issue_message', ['item' => $item]));
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FreelanceContract $freelance_contract)
    {
        return view('admin.freelance_contracts.show')->with('contract', $freelance_contract);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
//    public function edit(FreelanceContract $freelance_contract)
//    {
//        return view('admin.freelance_contracts.edit')->with([
//            'contract' => $freelance_contract,
//        ]);
//
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(UpdateFreelanceContractRequest $request, FreelanceContract $freelance_contract)
//    {
//        $item = checkLocale('ar') ? "عقد العمل الحر" : "The Freelance Contract";
//        try {
//            $freelance_contract->update($request->validated());
//            if ($request->has('image')){
//                if (key_exists('logo', $request->image)){
//                    $freelance_contract->clearMediaCollection('logo');
//                    MediaHelper::uploadMedia(new Request(['logo' => $request->image['logo']]), $freelance_contract);
//                }
//                if (key_exists('info', $request->image)){
//                    $freelance_contract->clearMediaCollection('info');
//                    MediaHelper::uploadMedia(new Request(['image' => $request->image['info']]), $freelance_contract);
//                }
//            }
//            return redirect()->route('admin.freelance-contracts.index')->with('success', __('messages.updated',['item'
//            => $item]));
//        } catch (\Exception $e) {
//            return redirect()->route('admin.freelance-contracts.edit', $freelance_contract->id)->with('issue_message', trans('common.issue_message', ['item' => $item]));
//        }
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FreelanceContract $freelance_contract)
    {
        $item = checkLocale('ar') ? "عقد العمل الحر" : "The FreelanceContract";
        try {
            $freelance_contract->freelancers()->sync([]);
            $freelance_contract->delete();
            return redirect()->route('admin.freelance-contracts.index')->with('success', __('messages.deleted', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.freelance-contracts.index')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }
    
    public function printPdf(FreelanceContract $freelanceContract){

            $data = [
                    'freelanceContract' => $freelanceContract,
            ];
            printPdf('admin.freelance_contracts.pdf.pdf',$data , 'file.pdf'.'-report.pdf');
        
    }
}
