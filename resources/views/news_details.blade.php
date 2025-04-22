<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>নিউজ সাইট</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body class="bg-gray-100">
    <div class="bg-gray-200 text-gray-700 text-center p-2 text-2xl">
        <span id="current-date"></span>
    </div>
    <x-navbar> </x-navbar>
    <x-full-news :news="$news" :lastNews="$lastNews"></x-full-news>
    <x-footer></x-footer>

    <script>
        document.getElementById("current-date").innerText = new Date().toLocaleDateString("bn-BD", {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        document.getElementById("menu-toggle").addEventListener("click", function() {
            document.getElementById("menu").classList.toggle("hidden");
        });
    </script>
</body>

</html>
