<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KapanLagiEvent.com</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @googlefonts

    @googlefonts('zenkaku_gotic')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

</head>
<body>
    @yield('content')

    @if (session('toast'))
    <x-toast :message="session('toast')['message']" :type="session('toast')['type']" />
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toastElement = document.getElementById('toast-notification');

            if (toastElement) {

                const hideToast = () => {

                    toastElement.classList.add('opacity-0', 'translate-x-full');

                    setTimeout(() => {
                        toastElement.remove();
                    }, 500);
                };

                setTimeout(() => {
                    toastElement.classList.remove('opacity-0', 'translate-x-full');
                }, 100);

                setTimeout(hideToast, 5000);

                const closeButton = toastElement.querySelector('[data-dismiss-target]');
                if (closeButton) {
                    closeButton.addEventListener('click', hideToast);
                }
            }
        });

    </script>

</body>
</html>
