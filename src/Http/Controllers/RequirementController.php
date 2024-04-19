<?php

namespace laravelLara\infoinst\Http\Controllers;

use App\Http\Controllers\Controller;
use laravelLara\infoinst\utils\RequirementChecker;

class RequirementController extends Controller
{
    protected $requirements;

    public function __construct(RequirementChecker $checker)
    {
        $this->requirements = $checker;
    }


    public function index(){

        $requirements = $this->requirements->check(
            config('installer.requirements.requirements')
        );

        $phpSupportInfo = $this->requirements->checkPHPversion(
            config('installer.requirements.core.minPhpVersion')
        );

        return view('Installation::installer.requirement', compact('requirements', 'phpSupportInfo'));

    }
}
