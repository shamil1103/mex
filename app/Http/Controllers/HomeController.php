<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Index
     *
     * @return View
     */
    public function index(): View
    {
        $data               = [];
        $data['menu']       = "dashboard";
        $data['child_menu'] = "";

        return view("pages.home", $data);
    }

    /**
     * Dashboard
     *
     * @return View
     */
    public function dashboard(): View
    {
        $data               = [];
        $data['menu']       = "dashboard";
        $data['child_menu'] = "";

        return view("pages.home", $data);
    }
}
