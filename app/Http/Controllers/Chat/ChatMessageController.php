<?php

namespace App\Http\Controllers\Chat;

use App\Models\Chat\Message;
use App\Events\Chat\MessageCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\StoreMessageRequest;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{
    /**
     * Zeige alle messages von heute an.
     * @return [type] [description]
     */
    public function index()
    {   
        if (count(auth()->user()->mToday())) {
            $location = auth()->user()->mToday()->location;
            $messages = Message::with(['user'])->whereDate('created_at', today())
                        ->where('location_id', $location->id)->latest()->get();
            return response()->json($messages,200);
        }
        return;
    	
    }

    public function store(StoreMessageRequest $request)
    {
    	$message = $request->user()->messages()->create([
    		'body' => $request->body,
            'location_id' => $request->locationId,
    	]);

        broadcast(new MessageCreated($message))->toOthers();

    	return response()->json($message,200);
    }
}
