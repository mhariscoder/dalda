<?php

namespace App\Http\Controllers\Cms\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function appearedInTestCreate(Request $request)
    {
        try {
            $request->validate([
                'appeared_in_test' => 'required|numeric'
            ]);

            $settings = Setting::query()->firstOrNew();
            if($settings) {
                $settings->appeared_in_test = $request->input('appeared_in_test');
                $settings->save();

                return redirect()->back()->with('success', "Update Successfully!");
            }
        } catch (\Exception $e) {
            
        }
    }
}
