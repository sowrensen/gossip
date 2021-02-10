# Gossip

Gossip is a quick chat app **built for testing purpose**. I've used Laravel 8 with Jetstream-Inertia-Tailwind
scaffolding for frontend views. There are two different implementation for the realtime messaging:

- The **master** branch uses Pusher along with Laravel Echo.
- The **websocket** branch uses `laravel-websockets` package instead. You have to keep `php artisan websockets:serve`
  command running in order to send/receive realtime messages.

Both works fine with a very little amount of refactoring. Rest of the application is standard Laravel.
