<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskSender;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('customer')->orderBy('created_at', 'desc')->get();

        return view( 'admin.component.task.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::where('active', '=', 1)->get();

        return view( 'admin.component.task.create', ['customers' => $customers]);
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

        if($data['customer_id'] === '0')
            unset($data['customer_id']);

        if(isset($data['active'])){
            $data['active'] = 1;
        }else{
            $data['active'] = 0;
        }

        $task = Task::create($data);

        if (isset($data['customer_id'])) {
            $customer = Customer::where('id', '=', $data['customer_id'])->first();
            Mail::to($customer->email, env('MAIL_FROM_NAME'))->send(new TaskSender($task));
        }

        return redirect('/admin/tasks');
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
        $task = Task::with('customer')->where('id', '=', $id)->get();

        $customers = Customer::where('active', '=', 1)->get();

        return view( 'admin.component.task.edit', ['task' => $task[0], 'customers' => $customers]);
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

        if($data['customer_id'] === '0')
            unset($data['customer_id']);

        if(isset($data['active'])){
            $data['active'] = 1;
        }else{
            $data['active'] = 0;
        }

        Task::where('id', $id)
            ->update($data);

        if (isset($data['customer_id'])) {

            $task = Task::where('id', $id)->first();

            $customer = Customer::where('id', '=', $data['customer_id'])->first();
            Mail::to($customer->email, env('MAIL_FROM_NAME'))->send(new TaskSender($task));
        }

        return redirect('/admin/tasks');

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
