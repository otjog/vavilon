<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class IndexController extends Controller
{

    private $data;

    private $news;

    public function __construct(News $news)
    {
        $this->news = $news;

        $this->data['news'] = $news->getLastActiveNews();
    }

    public function index()
    {
        return view('index')->with($this->data);
    }
}
