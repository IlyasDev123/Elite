<?php

namespace App\Services;

use App\Models\Notification;

class NotificationService
{
    public function sendNotification($type, $notifiableId, $notifiableType, $message, $sendToId, $sendToType, $sendById = null, $sendByType = null)
    {
        return  Notification::create([
            'type' => $type,
            'notifiable_id' => $notifiableId,
            'notifiable_type' => $notifiableType,
            'content' => $message,
            'send_to_id' => $sendToId ?? null,
            'send_to_type' => $sendToType ?? null,
            'send_by_id' => $sendById,
            'send_by_type' => $sendByType,
        ]);
    }

    public function markAsRead($notificationId)
    {
        return Notification::where('id', $notificationId)->update(['is_read' => true]);
    }

    public function getNotifications()
    {
        return Notification::where('send_to_id', auth()->id())->get();
    }

    public function getAdminNotifications()
    {
        return Notification::where('send_to_id', auth('admin')->id())->get();
    }
}
