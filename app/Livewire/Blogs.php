<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class Blogs extends Component
{
    public $posts;
    public $pageNumber = 1;
    public $hasMorePages;

    public function mount(Request $request)
    {
        $this->posts = new Collection();
        $this->loadPosts($request);
    }

    public function loadPosts(Request $request)
    {
        $query = Blog::latest('created_at');

        if ($request->has('search') && $request->search != '') {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('id', 'like', $searchTerm)
                    ->orWhere('title', 'like', $searchTerm)
                    ->orWhereHas('category', function ($q) use ($searchTerm) {
                        $q->where('category', 'like', $searchTerm);
                    });
            });
        }

        $posts = $query->paginate(6, ['*'], 'page', $this->pageNumber);
        $this->pageNumber += 1;
        $this->hasMorePages = $posts->hasMorePages();
        $this->posts->push(...$posts->items());
    }

    public function render()
    {
        return view('livewire.blogs');
    }
}
