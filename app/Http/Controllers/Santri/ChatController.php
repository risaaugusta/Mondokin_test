<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Chat;

class ChatController extends Controller
{
    public function index($type)
    {
        $chats = Chat::where('santri_id', Auth::user()->Santri->id)->where('type', $type)->get();
        return view('santri.chat', [
            'chats' => $chats,
            'type' => $type
        ]);
    }

    public function store(Request $request)
    {
        Chat::create($request->all());
        $request->session()->flash('success', 'Pesan Berhasil dikirim');
        return redirect()->back();
    }
}
