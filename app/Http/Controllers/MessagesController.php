<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Models\Comment;
use Torann\GeoIP\Facades\GeoIP;
use Jenssegers\Agent\Agent;

class MessagesController extends Controller
{
    public function index() {
        $messages = Comment::query()->where('article_id', 0)->where('comment_id', 0)->orderByDesc('created_at')->get();

        return view('messages.index', [
            'message'   => new Comment(),
            'messages'  => $messages,
        ]);
    }

    public function store(MessageRequest $request) {
        $agent = new Agent();
        $user = $request->user();

        $ip = $request->getClientIp();
        $location = GeoIP::getLocation($ip)->toArray();
        $browser = $agent->browser();
        $version = $agent->version($browser);

        $data = [
            'content'       => $request->content,
            'article_id'    => $request->article_id ? : 0,
            'user_id'       => $user->id,
            'comment_id'    => $request->targetUserId ? : 0,
            'location'      => $location['state_name'].'-'.$location['city'],
            'browser'       => $browser.'-'.$version,
            'ip'            => $ip
        ];

        Comment::create($data);

        if($request->article_id) {
            Article::find($request->article_id)->increment('comment_count');
        }

        return redirect(route('messages.index'));

    }
}
