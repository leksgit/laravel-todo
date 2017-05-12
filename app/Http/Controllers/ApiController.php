<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response| array
     */


    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|max:255',
            'descriptions' => 'required|max:4000',
            'priority' => 'required|between:0,3',
            'status' => 'required|between:0,2',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return $this->responseError('422', $validator->errors()->all());


        $task = Task::create(
            array_merge(
                ['user_id' => auth()->id()],
                $request->all()
            )
        );


        return $this->responseOk(
            view('task.taskRowTable', ['task' => Task::where('id', $task->id)->first(), 'key' => $task->id])->render()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return array
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'priority' => 'required|integer|between:0,1',
            'status' => 'required|between:0,2',
            'id' => 'required|exists:task,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return $this->responseError('422', $validator->errors()->all());

        $task = Task::find($id);

        if ($request->get('status') == 3){
            $task->delete();
            $respons = [
                'tr' => '',
                'show' => false,
            ];
        }else{
            $task->update($request->all());
            $respons = [
                'tr' => view('task.taskRowTable', ['task' => Task::where('id', $task->id)->first()])->render(),
                'show' => ($task->status == 2)? false : true,
            ];
        }

        return $this->responseOk($respons);

    }

    /**
     * Standard good response method
     *
     * @param $data array
     * @return array
     */
    public function responseOk($data)
    {
        return [
            'status' => 'ok',
            'code' => 200,
            'data' => $data,
        ];
    }

    /**
     * Standard error response method
     *
     * @param $data array
     * @return array
     */
    public function responseError($code, $data)
    {
        return [
            'status' => 'error',
            'code' => $code,
            'data' => $data,
        ];
    }


}
