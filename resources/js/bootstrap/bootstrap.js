import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

export default function bootstrap(){
    window.Pusher = Pusher;

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: import.meta.env.VITE_PUSHER_APP_KEY,
        cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
        forceTLS: true
    });

    Echo.channel('chat')
        .listen('MessageSent', (e) => {
            console.log(`${e.user.name}: ${e.message}`);
            // Update chat UI
        });
}
