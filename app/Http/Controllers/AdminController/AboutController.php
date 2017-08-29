<?php

namespace App\Http\Controllers\AdminController;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    protected function index()
    {
        $data['about'] = About::first();
        return view('admin.about',$data);
    }

    protected function store(Request $r)
    {
        //echo "<pre>";print_r($r->all());die();

        About::where('id',1)->update(['content'=>$r->input('summernote')]);

        return redirect('admin/about');
    }
    protected function show()
    {
        $data['about_info'] = About::first();
        //dd($data);
        return view('tutor.public',$data);
    }
}
