<?php

namespace App\Http\Controllers\admin;

use App\Facades\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function edit($key, Request $request)
    {
        $setting = Setting::where('key' , $key)->first();
        return view("admin.settings.$key")
            ->with('setting', $setting);
    }

    public function update($key, UpdateSettingRequest $request)
    {
        $item = checkLocale('ar') ? "الإعدادات" : "The sitting";
        $setting = Setting::where('key' , $key)->first();
        $setting->update(['value' => $request->value]);
        if ($request->has('image')){
            $setting->clearMediaCollection($key);
            $dd = MediaHelper::uploadMedia($request, $setting);
        } else if ($request->avatar_remove) {
            $setting->clearMediaCollection($key);
        }

        if ($setting) {
            return redirect()->route('admin.settings', ['key'=>$key])->with('success', __('messages.updated', ['item' => $key]));
        } else {
            return back()->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

}
