<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{__('dashboard.messages')}}</h4>
    </div>
    <div class="comment-widgets scrollable">
        <!-- Comment Row -->
        @forelse($latest_messages as $latest_message)
        <div class="d-flex flex-row comment-row m-t-0">
            <div class="p-2"><img src="{{@$latest_message->user->image->url?'/storage/'.@$latest_message->user->image->url:asset('assets/site/images/avatar.png')}}" alt="user" width="50" class="rounded-circle"></div>
            <div class="comment-text w-100">
                <h6 class="font-medium">{{$latest_message->name}}</h6>
                <span class="m-b-15 d-block">{{$latest_message->message}} </span>
                <div class="comment-footer">
                    <span class="text-muted float-right">Phone: {{$latest_message->phone}}</span>
                    <form method="post"  action="{{route('messages.destroy', $latest_message->id )}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">{{__('dashboard.delete')}}</button>
                    </form>
                </div>
            </div>
        </div>
            @empty
            <div class="d-flex flex-row comment-row m-t-0">
                {{__('site.null')}}
            </div>
        @endforelse

    </div>
</div>
