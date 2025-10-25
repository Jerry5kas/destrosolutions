<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(20);
        $unreadCount = Notification::unread()->count();
        
        return response()->json([
            'notifications' => $notifications,
            'unreadCount' => $unreadCount
        ]);
    }

    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->markAsRead();
        
        // Return redirect URL based on notification type
        $redirectUrl = $this->getRedirectUrl($notification);
        
        return response()->json([
            'success' => true,
            'message' => 'Notification marked as read',
            'redirect_url' => $redirectUrl
        ]);
    }

    public function markAllAsRead()
    {
        Notification::unread()->update([
            'is_read' => true,
            'read_at' => now()
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'All notifications marked as read'
        ]);
    }

    private function getRedirectUrl($notification)
    {
        switch ($notification->type) {
            case 'contact_form':
                if (isset($notification->data['contact_id'])) {
                    return route('admin.contacts.show', $notification->data['contact_id']);
                }
                return route('admin.contacts.index');
            default:
                return route('admin.dashboard');
        }
    }

    public function getUnreadCount()
    {
        $count = Notification::unread()->count();
        
        return response()->json([
            'unreadCount' => $count
        ]);
    }
}