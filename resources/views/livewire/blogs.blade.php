<div class="row">
    @foreach($posts as $b)
    <div class="col-4 mb-3">
        <div class="card p-3">
            <img src="{{ asset('vendor/img/'.$b->image) }}" alt="" class="rounded">
            <div class="card-body">
                <a href="{{ route('list-category',['category'=>$b->category->category]) }}"><span class="badge bg-body-secondary text-primary">{{ $b->category->category }}</span></a>
                <h4><a href="{{ route('show-blog', ['title' => $b->title]) }}" class="link text-dark text-decoration-none">{{ Illuminate\Support\Str::limit($b->title, 40, '...') }}</a></h4>
                <div class="author d-flex">
                    <i class="bi bi-person-circle"></i>
                    <p class="text-secondary mx-3">{{ $b->user->name }}</p>
                    <p class="text-secondary">{{ $b->date }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @if ($hasMorePages)
    <div class="d-flex items-center justify-content-center my-3">
        <button class="btn btn-transparent border" wire:click="loadPosts">
            Load More
        </button>
    </div>
    @endif
</div>