<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Controllers\Controller;
use App\Services\ChatGPT\ChatService;
use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;

class ChatGPTController extends Controller
{
    public function index(Request $request)
    {
        $response = '';
        return view('Admin.chat.index', ['response' => $response]);
    }

    public function genearteTextResponse(Request $request, ChatService $chatGPTService)
    {
        $prompt = $request->prompt;
        $response = $chatGPTService->generateResponse($prompt);
        return view('Admin.chat.index', ['response' => $response['message']['content']]);
    }
    public function showImageToText()
    {
        $response = '';
        return view('Admin.chat.index', ['response' => $response]);
    }
    public function imageToText(Request $request, ChatService $chatGPTService)
    {
        $imagePath = $request->file('file')->getRealPath();
        $text = (new TesseractOCR($imagePath))
            ->run();
       $response = $chatGPTService->generateResponse($request->prompt. ' ' .$text);
        return view('Admin.chat.index', ['response' => $response['message']['content']]);

    }
}
