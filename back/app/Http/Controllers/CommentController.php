<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add_comments(Request $request)
    {
        $comment = new Comment();
        $comment->teacher_id = $request->teacher_id;
        $comment->student_id = $request->student_id;
        $comment->comment = $request->comment;
        $comment->img = $request->img;
        $comment->save();
        return response()->json([
            'message' => 'success'
        ]);
    }
    public function get_comment_by_id()
    {
        return Comment::with('teachers','teachers.users','students')->get();
    }

}
