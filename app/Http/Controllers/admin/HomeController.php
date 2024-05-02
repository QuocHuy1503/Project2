<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TempImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        Auth::guard('admin')->user();

        // Delete temp images here
        $dayBeforeToday = Carbon::now()->subDays(1)->format('Y-m-d H:i:s');
        $tempImages = TempImage::where('created_at', '<=', $dayBeforeToday)->get();
        foreach ($tempImages as $tempImage){
            $path = public_path('/temp/'.$tempImage->name);

            //Delete main images
            if (File::exists($path)){
                File::delete($path);
            }
            TempImage::where('id', $tempImage->id)->delete();
        }


        return view('admin.dashboard');
        //echo 'welcome'.$admin->name.' <a href="'.route('admin.logout').'">Logout</a>';
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
