<?php

namespace App\Http\Controllers\forum;

use App\Http\Controllers\Controller;
use App\Models\forum\ForumCategory;
use App\Models\forum\ForumPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\CheckTrait;

class ForumPostController extends Controller
{
    use CheckTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $posts = ForumPost::with([
            'user',
            'comments.children',
            'category',
            'whoLiked' => function ($query) {
                $query->where('user_id', Auth::id());
            },
        ])->paginate(10);

        // return response()->json(['posts' => $posts]);
        $categories = ForumCategory::pluck('name', 'id');
        // return response()->json($posts);
        return view('ihya.forum.index', compact('categories', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        try {
            $categoryId = decrypt($request->category);
        } catch (\Exception $e) {
            return response()->json(['error' => "Dont try to manipulate"], 400);
        }
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'category' => decrypt($request->category),
            'slug' => $this->createSlug($request->title, 'App\Models\forum\ForumPost')
        ];
        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|exists:forum_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'required|unique:forum_posts,slug',
        ];
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . $id . '.' . $image->getClientOriginalExtension();
            $imagePath = $name;
            $image->move(public_path('forums'), $imagePath);
        }
        Validator::make($data, $rules)->validate();
        $post = ForumPost::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => $id,
            'forum_category_id' => $data['category'],
            'image' => $imagePath,
            'slug' => $data['slug'],
        ]);
        return response()->json(['message' => 'Post created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function forum_like(Request $request)
    {
        $postId = decrypt($request->postId);
        $post = ForumPost::find($postId);
        $userId = Auth::user()->id;
        $liked = $post->whoLiked()->where('user_id', $userId)->exists();
        if ($liked) {
            $post->whoLiked()->detach($userId);
            return response()->json(['message' => 'Disliked', 'likes' => $post->likes()->count()]);
        } else {
            $post->whoLiked()->attach($userId);
            return response()->json(['message' => 'Liked', 'likes' => $post->likes()->count()]);
        }
    }
}
