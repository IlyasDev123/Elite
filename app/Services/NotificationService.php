<?php

namespace App\Services;

use App\Models\Notification;

class NotificationService
{
    public function send($notifiableId, $notifiableType, $message, $sendById, $sendByType, $sendToId, $sendToType)
    {
        return  Notification::create([
            'notifiable_id' => $notifiableId,
            'notifiable_type' => $notifiableType,
            'content' => $message,
            'send_by_id' => $sendById,
            'send_by_type' => $sendByType,
            'send_to_id' => $sendToId,
            'send_to_type' => $sendToType,
        ]);
    }
}
