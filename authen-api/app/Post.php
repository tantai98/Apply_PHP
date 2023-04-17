<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'content',
    ];

    public function editPost($data) {
        DB::table('post')
                ->where('id', $data->id)
                ->where('user_id', $data->user_id)
                ->update(['title' => $data->title,
                'content' => $data->content
            ]);
    }

    public function deletePost($data) {
        $roleUser = DB::table('user__details')->select('role')->where('user_id', $data->user_id)->get();
        if($roleUser['role']='admin') {
            DB::table('post')
                ->where('id', $data->id)
                ->delete();
        } else {
            DB::table('post')
                ->where('id', $data->id)
                ->where('user_id', $data->user_id)
                ->delete();
        }
        
    }

    public function showPost($data) {
        return DB::table('post')->where('user_id', $data->user_id)->get();
    }

}
