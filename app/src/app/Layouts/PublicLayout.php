<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Character set declaration for the document -->
    <meta charset="UTF-8">
    <!-- Viewport settings to make the layout responsive on different screen sizes -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page title dynamically generated from PHP -->
    <title><?= $title . ' - ' . getenv('APP_NAME'); ?></title>
    <!-- Favicon link -->
    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
    <!-- Tailwind CSS framework (via CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Main stylesheet for the application -->
    <link rel="stylesheet" href="/assets/css/app.css">
    <!-- Tailwind custom JavaScript file (local) -->
    <script src="/assets/js/tailwind.js"></script>
    <!-- FontAwesome CDN for icons -->
    <script src="https://kit.fontawesome.com/f80b94bd90.js" crossorigin="anonymous"></script>
</head>

<body class="w-full h-full bg-gray-50">
    <div class="p-2 md:p-6">
        <!-- Logo -->
        <div class="flex justify-center">
            <a href="/">
                <img src="/assets/images/logo.png" alt="Logo" class="mx-auto mb-4 w-36 md:w-48">
            </a>
        </div>

        <!-- Main Content (Dynamic) -->
        <div class="max-w-6xl bg-white mx-auto rounded-lg p-2 md:p-6 mb-8 border border-gray-200">
            <?= $content; ?>
        </div>
    </div>

    <!-- Return Button -->
    <div id="returnBtn" class="fixed bottom-16 right-16">
        <a href="javascript:history.back()" class="bg-primary hover:bg-primaryDark text-white py-2 px-4 rounded-lg">
            <i class="fa-solid fa-rotate-left"></i> Volver atrás
        </a>
    </div>

    <script type="module" src="/assets/js/cookieconsent-config.js"></script>
</body>

</html>
