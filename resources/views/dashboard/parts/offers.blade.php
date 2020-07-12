<div class="card">
    <div class="card-body">
        <h4 class="card-title">Offers</h4>
    </div>
    <div class="comment-widgets scrollable">
        <!-- Comment Row -->
        @forelse($offers as $offer)
        <div class="d-flex flex-row comment-row m-t-0">
            <div class="p-2"><img style="border-radius: 0 !important;" src="../../assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle"></div>
            <div class="comment-text w-100">
                <h6 class="font-medium">{{$offer->name}}</h6>
                <span class="m-b-15 d-block">{{$offer->description}} </span>
                <div class="comment-footer">
                    <span class="text-muted float-right">{{$offer->price}}</span>
                    <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                    <button type="button" class="btn btn-success btn-sm">Publish</button>
                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </div>
        </div>
            @empty
        @endforelse
    </div>
</div>
