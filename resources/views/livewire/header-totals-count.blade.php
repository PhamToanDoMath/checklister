<div class="row">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header">
            {{ __('Store Review')}}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9 row">
                    @foreach($checklists as $checklist)
                    <div class="col-sm-12 col-md-3">
                        <strong>{{$checklist->name}}</strong><br>
                        <strong>{{$checklist->user_tasks_count}}/{{$checklist->tasks_count}}</strong>
                        <div class="progress progress-xs mt-2">
                            <div class="progress-bar bg-success" 
                            role="progressbar" 
                            style="width: {{$checklist->user_tasks_count/$checklist->tasks_count * 100}}%" 
                            aria-valuenow="{{$checklist->user_tasks_count/$checklist->tasks_count * 100}}" 
                            aria-valuemin="0" 
                            aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="col-md-3">
                    <h3>{{$checklists->sum('user_tasks_count')}}/{{$checklists->sum('tasks_count')}}</h3>
                </div>

            </div>
        </div>
        </div>
    </div>
</div>