<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Lottery;
use App\Models\Event;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactToUs;

class IndexController extends Controller
{

    private $data;

    public function __construct(News $news, Lottery $lotteries, Event $events, Customer $customers)
    {
        $this->data['news'] = $news->getLastActiveNews();

        $this->data['event'] = $events->getNextEvent();

        $this->data['lotteries'] = $lotteries->getLastLotteries();
    }

    public function index()
    {
        return view('index')->with($this->data);
    }

    public function sendMail(Request $request)
    {
        $data = $request->all();

        unset($data['_token']);

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactToUs($data));

        return redirect('/')->with('status_new_contact', 'Мы получили ваш донос!');
    }
}
