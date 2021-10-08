<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
</head>

<body>
    <nav class="fixed inset-0 h-16">
        <div class="bg-white" id="jasdjd">
            <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-center h-16">
                    <ul class="flex items-center space-x-8 lg:flex">
                        <li><a href="<?= base_url('/dashboard'); ?>" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Home</a></li>
                        <li><a href="<?= base_url('/dashboard/voters'); ?>" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Voters</a></li>
                        <li><a href="<?= base_url('/dashboard/candidates'); ?>" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Candidates</a></li>
                        <li><a href="<?= base_url('/dashboard/result'); ?>" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Result</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>




    <div class="mt-16 mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8 py-8">
        <?= $this->renderSection('content'); ?>
        <div class="min-h-screen"></div>
    </div>

    <script>
        const handleClick = () => console.log("hello")

        const scroll = document.querySelector('#jasdjd')
        window.onscroll = () => {
            if (window.scrollY > 0) {
                scroll.classList.add('ring-1', 'ring-gray-200', 'bg-opacity-75');
            } else {
                scroll.classList.remove('ring-1', 'ring-gray-200', 'bg-opacity-75');
            }
        };
    </script>
</body>

</html>