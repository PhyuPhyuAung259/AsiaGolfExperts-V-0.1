<?php
namespace Themes\Findhouse\Dashboard\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\AdminController;

class DashboardController extends AdminController
{

    public function index()
    {
        return View('Dashboard::index');
    }
}
