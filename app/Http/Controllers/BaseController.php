<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{  
    private $request;

    private $resources = [
        'styles' => [],
        'scripts' => [],
        'metas' => []
    ];
    private $runtimeParams = [];

    public function __construct(Request $r){
        $this->request;
    }

    public function view($view, $params = [], $addDefaultResources = true){
        if(!View::exists($view)){
            abort(404);
        }

        if($addDefaultResources){
            $this->setDefaultResources($view);
        }

        $params['runtime'] = $this->runtimeParams;
        $params['resources'] = $this->resources;

        return view($view,$params);
    }

        private function setDefaultResources($view = ''){
            $file = str_replace(".", "/", $view);

            if(file_exists(base_path('public/scripts/'.$file.".js"))){
                $this->addResource('script', ['scripts/'.$file.".js"]);
            }

            if(file_exists(base_path('public/styles/'.$file.".css"))){
                $this->addResource('style', ['styles/'.$file.".css"]);
            }
        }

    public function setRuntimeParams($params = [], $key = "", $method = "merge"){
        if(is_array($params)){
            if($method == "merge"){
                $this->runtimeParams = array_merge($this->runtimeParams,$params);
                return true;
            }

            $this->runtimeParams = $params;
            return true;
        }

        $this->runtimeParams[$key] = $params;
        return true;
    }

    public function removeRuntimeParam($key){
        unset($this->runtimeParams[$key]);
        return $this->runtimeParams;
    }

    public function addResource($type = "",$data = [], $external = false){
        switch ($type) {
            case 'style':
                return $this->addStyleResource($data);
                break;

            case 'script':
                return $this->addScriptResource($data, $external);
                break;
            
            default:
                return false;
                break;
        }
    }

        private function addStyleResource($style_data){
            $this->resources['styles'][] = url('styles/'.$style_data[0]);
            return $this->resources['styles'];
        }

        private function addScriptResource($script_data, $external = false){
            $src = $script_data['src'] :: $script_data[0];
            $src = ($external) ? url('scripts/'.$src) : $src;

            $this->resources['scripts'][] = [
                'type' => $script_data['type'] ?? 'module',
                'src' => $src
            ];
            return $this->resources['scripts'];
        }


    public function dd($sg){
        if(env('APP_ENV') != "production"){
            dump($sg);
        }
    }
}
