<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = \App\Models\ContactMessage::latest()->get();
        return view('admin.contact-messages.index', compact('messages'));
    }

    public function show(string $id)
    {
        $message = \App\Models\ContactMessage::findOrFail($id);
        $message->update(['is_read' => true, 'read_at' => now()]);
        return view('admin.contact-messages.show', compact('message'));
    }

    public function destroy(string $id)
    {
        $message = \App\Models\ContactMessage::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.contact-messages.index')->with('success', 'Message deleted successfully.');
    }

    public function markAsRead(string $id)
    {
        $message = \App\Models\ContactMessage::findOrFail($id);
        $message->update(['is_read' => true, 'read_at' => now()]);
        return redirect()->route('admin.contact-messages.index')->with('success', 'Message marked as read.');
    }
}
