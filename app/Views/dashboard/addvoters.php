<?= $this->extend('dashboard/template'); ?>


<?= $this->section('content'); ?>

<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->


<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Tambah Voters</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Tambah voters yang akan memilih.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="<?= base_url('/crud/addvoters'); ?>" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="name" id="name" class="mt-1 focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md py-2 px-3">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                <input type="text" name="username" id="username" class="mt-1 focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md py-2 px-3">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" id="password" class="mt-1 focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border items-baseline border-gray-300 rounded-md py-2 px-3">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="confirm" class="block text-sm font-medium text-gray-700">Konfirmasi</label>
                                <input type="password" name="confirm" id="confirm" class="mt-1 focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md py-2 px-3">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="class" class="block text-sm font-medium text-gray-700">Kelas</label>
                                <select id="class" name="class" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <?php foreach ($classes as $class) : ?>
                                        <option value="<?= $class->id; ?>"><?= $class->class; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>