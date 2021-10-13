<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Admin</title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
</head>

<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Register New Admin
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="<?= base_url('/admin/register'); ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="col-span-6 sm:col-span-3">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username" class="mt-1 focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md py-2 px-3" value="<?= (old('username')); ?>">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md py-2 px-3">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="confirm" class="block text-sm font-medium text-gray-700">Confirm</label>
                    <input type="password" name="confirm" id="confirm" class="mt-1 focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md py-2 px-3">
                </div>


                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none">
                        Sign up
                    </button>
                </div>
                <div class="text-sm text-red-600 text-center">
                    <?= sizeof($validation->getErrors()) > 0 ? "Register gagal" : ''; ?>

                    <?php if (!empty((session()->getFlashdata('gagal')))) : ?>
                        <?= session()->getFlashdata('gagal'); ?>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

</body>

</html>