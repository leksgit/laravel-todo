@if($task->status == 0)
    <tr class="success">
@elseif($task->status == 1)
    <tr class="warning">
@elseif($task->status == 2)
    <tr class="info">
@endif
        <th class="id col-md-1">{{ $task->id }}</th>
        <th class="col-md-2">{{ $task->name }}</th>
        <th class="col-md-5">{{ $task->descriptions }}</th>
        <th class="col-md-2">{{ Form::selectRange('priority', 0,3, $task->priority, ['class' => 'form-control updated']) }}</th>
        <th class="col-md-2">{{ Form::select('status', [0 => 'active', 1=> 'work', 2=> 'end', 3 =>'delete' ], $task->status, ['class' => 'form-control updated']) }}</th>
    </tr>