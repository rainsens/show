import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
import {initCarousels} from "flowbite";
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

const channelPayload = document.getElementById('channel');
const channel = channelPayload ? channelPayload.value : 'screen_1';

window.Echo.channel(channel).listen("SlideSent", (event) => {
    const broadcastDiv = document.getElementById('broadcast');
    const carouselDiv = document.createElement('div');
    const slidesDiv = document.createElement('div');
    const spotsDiv = document.createElement('div');

    carouselDiv.setAttribute('id', 'default-carousel');
    carouselDiv.setAttribute('class', 'relative w-full');
    carouselDiv.setAttribute('data-carousel', 'slide');
    slidesDiv.setAttribute('class', 'relative h-screen overflow-hidden')
    spotsDiv.setAttribute('class', 'absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse');

    event.slides.forEach((slide, index) => {
        const div = document.createElement('div');
        const img = document.createElement('img');
        const button = document.createElement('button');

        div.setAttribute('data-carousel-item', '');
        div.setAttribute('class', 'hidden duration-700 ease-in-out');
        if (index === 0) {
            div.setAttribute('class', 'duration-700 ease-in-out');
        }

        img.src = slide.slide;
        img.setAttribute('class', 'absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2');
        img.setAttribute('alt', "...")
        div.appendChild(img);

        button.type = 'button';
        button.setAttribute('class', 'w-3 h-3 rounded-full');
        button.setAttribute('aria-current', index === 0 ? 'true' : 'false');
        button.setAttribute('aria-label', 'Slide ' + index);
        button.setAttribute('data-carousel-slide-to', index);

        slidesDiv.appendChild(div);
        spotsDiv.appendChild(button);
        carouselDiv.appendChild(slidesDiv);
        carouselDiv.appendChild(spotsDiv);
        broadcastDiv.appendChild(carouselDiv);
    })

    initCarousels();

})
