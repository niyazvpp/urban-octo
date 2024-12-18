<?php

namespace App\Http\Controllers\forum;

use App\Http\Controllers\Controller;
use App\Models\forum\ForumPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ForumCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        try {
            $forumPostId = decrypt($request->post_id);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Invalid post ID'], 400);
        }
        $parent_id = null;
        if ($request->parent_id) {
            try {
                $parent_id = decrypt($request->parent_id);
            } catch (\Throwable $th) {
                return response()->json(['error' => 'Invalid parent ID'], 400);
            }
        }
        $data = [
            'user_id' => Auth::user()->id,
            'content' => $request->content,
            'parent_id' => $parent_id,
        ];
        $rules = [
            'content' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:forum_comments,id',
            'user_id' => 'required|exists:users,id',
        ];
        Validator::make($data, $rules)->validate();
        $post = ForumPost::find($forumPostId);
        $post->comments()->create($data);
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
}
