<?php

namespace App\Http\Controllers\FinanceAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Chat;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::whereHas('Santri')->where('pesantren_id', Auth::user()->pesantren_id)->where('type', 'finance')->get()->groupBy('santri_id');
        return view('financeAdmin.chat.index')->withChats($chats);
    }

    public function show(Chat $chat)
    {
        $chats = Chat::where('santri_id', $chat->santri_id)->where('type', 'finance')->get();
        return view('financeAdmin.chat.show')->withChats($chats);
    }

    public function store(Request $request)
    {
        Chat::create($request->all());
        $request->session()->flash('success', 'Pesan Berhasil dikirim');
        return redirect()->back();
    }
}
