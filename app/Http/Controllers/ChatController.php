<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Events\NewMessageReceived;

class ChatController extends Controller
{
    public function rooms(): JsonResponse
    {
        return response()->json(Room::all());
    }

    public function messages(Room $room): JsonResponse
    {
        return response()->json(
            $room->messages()
                ->with('user'
                )->orderByDesc('created_at')
                ->get()
        );
    }

    public function storeMessage(Request $request, Room $room): JsonResponse
    {
        $message = $room->messages()->create([
            'user_id' => auth()->id(),
            'text' => $request->text
        ]);

        // Broadcast a new event to other participants
        broadcast(new NewMessageReceived($message))->toOthers();

        return response()->json($message, Response::HTTP_CREATED);
    }
}
