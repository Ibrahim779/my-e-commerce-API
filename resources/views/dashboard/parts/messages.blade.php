<div class="card">
    <div class="card-body">
        <h4 class="card-title">Latest Messages</h4>
    </div>
    <div class="comment-widgets scrollable">
        <!-- Comment Row -->
        @forelse($latest_messages as $latest_message)
        <div class="d-flex flex-row comment-row m-t-0">
            <div class="p-2"><img src="../../assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle"></div>
            <div class="comment-text w-100">
                <h6 class="font-medium">{{$latest_message->name}}</h6>
                <span class="m-b-15 d-block">{{$latest_message->message}} </span>
                <div class="comment-footer">
                    <span class="text-muted float-right">Phone: {{$latest_message->phone}}</span>
                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </div>
        </div>
            @empty
        @endforelse

    </div>
</div>
