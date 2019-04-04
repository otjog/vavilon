<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();

        return view( 'admin.component.news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.component.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wasteArray = [
            '_token' => '',
            '_method' => ''
        ];

        $data = array_diff_key($request->all(), $wasteArray);

        if(isset($data['active'])){
            $data['active'] = 1;
        }else{
            $data['active'] = 0;
        }

        News::create($data);

        return redirect('/admin/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oneNews = News::where('id', '=', $id)->get();

        return view( 'admin.component.news.edit', ['oneNews' => $oneNews[0]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wasteArray = [
            '_token' => '',
            '_method' => ''
        ];

        $data = array_diff_key($request->all(), $wasteArray);

        if(isset($data['active'])){
            $data['active'] = 1;
        }else{
            $data['active'] = 0;
        }

        News::where('id', $id)
            ->update($data);

        return redirect('/admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
