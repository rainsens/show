<x-layouts.broad>
    <input id="channel" type="hidden" value="{{ $channel }}">
    <div id="broadcast" class="h-screen" onclick="fullScreen()">

    </div>
    <script>
        const broadcast = document.getElementById('broadcast');
        function fullScreen() {
            if (broadcast.requestFullscreen) {
                broadcast.requestFullscreen();
            } else if (broadcast.msRequestFullscreen) {
                broadcast.msRequestFullscreen();
            } else if (broadcast.webkitRequestFullscreen) {
                broadcast.webkitRequestFullscreen();
            }
        }
    </script>
</x-layouts.broad>
