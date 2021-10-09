<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LandingController extends BaseController
{
    public function __construct(Request $r){
    	parent::__construct($r);
    }


    public function loadIndexView(){
    	$this->setRuntimeParams(['pageName' => 'Főoldal']);
    	return $this->view('screens.landings.index');
    }
}
