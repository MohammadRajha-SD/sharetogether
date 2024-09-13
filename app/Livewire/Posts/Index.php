<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Collection;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $posts;
    public $auth_id = null;
    public $category = null;
    public $offset = 0;
    public $limit = 6;
    public $hasMorePosts = true;
    public $selected_category;
    public $sub_category;

    public function mount()
    {
        $this->auth_id = auth()->id();
        $this->category = request()->get('category');
        $this->sub_category = request()->get('sub_category');
        $this->posts = new Collection();
        $this->loadPosts();
    }

    public function loadPosts()
    {
        $query = Post::where('user_id', '!=', $this->auth_id)
            ->with('comments.replies')
            ->orderBy('created_at', 'desc');

        if ($this->category) {
            $category = Category::with('sub_categories')->where('slug',$this->category)->first();
            $subcategories = $category->sub_categories->pluck('id')->toArray();

            if ($category) {
                $this->selected_category = $category->children;
                if ($this->sub_category) {
                    $subCategory = Category::firstWhere('slug', $this->sub_category);
                    if ($subCategory) {
                        $query->where('category_id', $subCategory->id);
                    }
                } else {
                    $query->where('category_id', $category->id)->orWhereIn('category_id', $subcategories);
                }
            }
        }

        $posts = $query->paginate($this->limit);

        $this->posts = $this->posts->merge($posts->items());
        $this->hasMorePosts = $posts->hasMorePages();

        if ($this->hasMorePosts) {
            $this->limit += $this->limit; 
        }
    }

    public function loadMore()
    {
        $this->loadPosts();
    }

    public function render()
    {
        return view('livewire.posts.index', [
            'posts' => $this->posts,
            'hasMorePosts' => $this->hasMorePosts,
        ]);
    }
}
