<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use App\Events\UserCreated;
use App\Events\UserUpdated;
use App\Events\UserDeleted;
use App\Services\DiscordNotifier;

class DiscordNotification
{
    protected $discordNotifier;

    public function __construct(DiscordNotifier $discordNotifier)
    {
        $this->discordNotifier = $discordNotifier;
    }

    public function handleUserCreated(UserCreated $event): void
    {
        $this->sendNotification($event->user, 'created', auth()->user());
    }


    public function handleUserUpdated(UserUpdated $event): void
    {
        $this->sendNotification($event->user, 'updated', auth()->user());
    }


    public function handleUserDeleted(UserDeleted $event): void
    {
        $this->sendNotification($event->user, 'deleted', auth()->user());
    }


    public function handleUserLogin(Login $event): void
    {
         $actor = auth()->user() ?: $event->user;
         $authMethod = session('auth_method', 'user');
         $this->sendNotification($event->user, 'login', $actor, $authMethod);
    }

    public function handleRegistered(Registered $event): void
    {
        $this->sendNotification($event->user, 'registered', $event->user);
    }


    protected function sendNotification($user, $action, $actor = 'user')
    {
        $colors = [
            'created' => '28a745',
            'updated' => 'ffc107',
            'deleted' => 'dc3545',
            'login' => '007bff',
            'registered' => '17c671',
        ];

        $color = $colors[$action] ?? 'ffffff';

        $embed = [
            'title' => "☢️  **RoadToLaravel**  ☢️",
            'description' => "## **User {$action}**",
            'color' => hexdec($color),
            'fields' => [
                [
                    'name' => '🔑 **User Id**',
                    'value' => "`{$user->id}`",
                    'inline' => true,
                ],
                [
                    'name' => '🩻 **User Names**',
                    'value' => "`{$user->names}`",
                    'inline' => true,
                ],
                [
                    'name' => '🩻 **User Lastnames**',
                    'value' => "`{$user->lastnames}`",
                    'inline' => true,
                ],
                [
                    'name' => '📧 **Email**',
                    'value' => "`{$user->email}`",
                    'inline' => false,
                ],
                [
                    'name' => '🪛 **Action performed by:**',
                    'value' => "**`{$actor->names}`** with the **`ID: {$actor->id}`**",
                    'inline' => false,
                ],
            ],
            'footer' => [
                'text' => implode(" | ", [
                    '🔔 RoadToLaravel notification',
                ]),
            ],
            'timestamp' =>now()->toIso8601String(),

            'thumbnail' => [
                'url' => 'https://avatarfiles.alphacoders.com/374/thumb-150-374378.png',
            ],
        ];

        try {
            $this->discordNotifier->sendEmbed($embed);
        } catch (\Exception $e) {
            \Log::error("Error sending discord notification: " . $e->getMessage());
        }
    }
}
