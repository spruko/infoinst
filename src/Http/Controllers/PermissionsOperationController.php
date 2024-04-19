<?php

namespace laravelLara\infoinst\Http\Controllers;

use App\Http\Controllers\Controller;
use laravelLara\infoinst\utils\PermissionChecker;

class PermissionsOperationController extends Controller
{
     /**
     * @var PermissionChecker
     */
    protected $permissions;

    /**
     * @param PermissionChecker $checker
     */
    public function __construct(PermissionChecker $checker)
    {
        $this->permissions = $checker;
    }

    public function index(){

        $permissions = $this->permissions->check(
            config('installer.requirements.permissions')
        );

        return view('Installation::installer.permissions', compact('permissions'));
    }
}
