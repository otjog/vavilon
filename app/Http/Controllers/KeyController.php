<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Key;
use Mockery\Exception;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $keys = Key::all();

        $data['customer_id'] = $request->customer_id;

        do {

            $key = random_int(1000000, 9999999);

            $flag = $keys->contains('key', $key);
        } while ($flag);

        $data['key'] = $key;

        Key::create($data);

        //todo сделать event для отправки уведомления игроку, что ему присвоен номер

        return redirect()->route('customers.index')->with('status', 'Вы зарегистрированы в системе! Ждите письмо с дальнейшими указаниями.');
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
        //
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
        $active = (!(boolean)$request->active*1);

        Key::where('id', $id)
            ->update(['active' => $active]);

        return redirect('/admin/customers');
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
