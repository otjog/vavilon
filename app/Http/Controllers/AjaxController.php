<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lottery;

class AjaxController extends Controller
{
    /**Инициализируем массив пришедших параметров*/
    protected $request = [];

    /**Инициализируем массив для хранения данных ответа*/
    protected $data = [];

    /**Инициализируем массив для хранения заголовков ответа*/
    protected $headers = [];

    /**Инициализируем переменную Ответ Сервера*/
    protected $response;

    public function index(Request $request){

        $this->request = $request->all();

        $lotteries = new Lottery();

        sleep(5);

        $lottery = $lotteries->getLastLottery();

        $this->data = $lottery->keys->key;

        return $this->sendResponse();

    }

    private function sendResponse(){

        //Присваиваем переменной экземпляр Ответа Сервера
        $this->response = response();

        $this->response = $this->response->json($this->data);

        if( count($this->headers) > 0){
            $this->response = $this->response->withHeaders($this->headers);
        }

        return $this->response;
    }
}
