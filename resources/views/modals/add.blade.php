<div class="modal fade" id="createTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-clear="clear" data-cancel="esc" data-url="{{ route('api.store') }}">
    <div class="modal-dialog mini-modal" role="document">
        <div class="modal-content">
            {!! Form::open([
                   'route' => 'api.store',
                   'autocomplete' => 'off',
                   'id'=> 'FormCreateTask',
                    ]) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="img-modal-label">Add new task</h4>
                <div class="alert alert-danger" hidden>
                    <strong>Danger!</strong> <span class="danger-text"></span>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row form-group">
                            <div class="col-md-4">
                                <p class="second" style="text-align: right">Name</p>
                            </div>
                            <div class="col-md-8">
                                <input name="name"  class="form-control" required maxlength="255">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <p class="second" style="text-align: right">Descriptions</p>
                            </div>
                            <div class="col-md-8">
                                <textarea name="descriptions"  rows="5"   class="form-control" maxlength="4000"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <p class="second" style="text-align: right">Priority</p>
                            </div>
                            <div class="col-md-8">
                                {{ Form::selectRange('priority', 0,3, null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <p class="second" style="text-align: right">status</p>
                            </div>
                            <div class="col-md-8">
                                {{ Form::select('status', [0 => 'active', 1=> 'work', 2=> 'end'], 0, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-custom submit">create</button>
                <a href="javascript:;" data-dismiss="modal" class="a_close">cancel</a>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>