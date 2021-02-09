<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

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
            'text' => $request->message
        ]);

        return response()->json($message, Response::HTTP_CREATED);
    }
}
