<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPanelController extends Controller
{
    protected function panel()
    {
        return view('admin.dashboard');
    }

    protected function tutorPanel()
    {
        return redirect('/tutor/profile_create');
    }
}
