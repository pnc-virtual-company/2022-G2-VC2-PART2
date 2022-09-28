<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add_comments(Request $request)
    {
        $comment = new Comment();
        $comment->teacher_id = $request->teacher_id;
        $comment->student_id = $request->student_id;
        $comment->comment = $request->comment;
        $comment->save();
        return response()->json([
            'message' => 'success'
        ]);
    }
    public function get_comment_by_id()
    {
        return Comment::with('teachers','teachers.users','students')->get();
    }
    public function update_notifications(Request $request, $id){
        $comments = Comment::where('teacher_id',$id)->get();
        for ($i = 0; $i < count($comments); $i++) {
            if ($comments[$i]->student_id == $request->student_id){
                $comments[$i]->is_check = true;
                $comments[$i]->save();
            }
        }
        return $comments;
    }
}
