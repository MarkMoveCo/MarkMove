<?php
namespace App\Http\Controllers;


class AdministrationController extends Controller
{
    public function getPermissions()
    {
        echo view('admin.permissions');
    }
}