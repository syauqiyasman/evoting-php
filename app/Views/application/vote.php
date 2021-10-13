<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote</title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
</head>

<body class="bg-gray-50">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8 py-8">
        <div class="mx-auto flex flex-wrap flex-col">
            <div class="flex mx-auto flex-wrap">
                <div id="step" class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 text-gray-300 tracking-wider">
                    <span class="mr-3">1</span>Pilih Ketua
                </div>
                <div id="step" class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 text-gray-300 tracking-wider">
                    <span class="mr-3">2</span> Pilih Wakil
                </div>
                <div id="step" class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 text-gray-300 tracking-wider">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>Konfirmasi
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-sm md:max-w-screen-md px-4 sm:px-6 lg:px-8 pb-8">
        <form id="vote" action="<?= base_url("/application/votepost/" . session()->get('voterlogin')); ?>" method="POST">
            <div id="page" class="hidden">
                <div class="grid gap-5 mx-auto md:grid-cols-2 max-w-full">
                    <?php $x = 0 ?>
                    <?php foreach ($ketua as $chief) : ?>
                        <div class="overflow-hidden rounded-md shadow">
                            <div class="relative" style="padding-top: 100%;">
                                <img src="<?= base_url("/img/$chief->image"); ?>" class="object-cover absolute top-0 w-full h-full" alt="" />
                            </div>
                            <div class="py-5 flex flex-col px-4">
                                <div>
                                    <p class="mb-2 text-xs font-semibold uppercase text-red-600">
                                        Calon Ketua
                                    </p>
                                </div>
                                <div>
                                    <p class="text-base font-bold"><?= $chief->name; ?></p>
                                </div>
                                <div class="text-sm mb-4">
                                    <p><?= $chief->class; ?></p>
                                </div>
                                <button type="button" onclick="openDialogVisiMisi(<?= $x++; ?>, 'KETUA')" class="mb-2 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:w-auto sm:text-sm">Visi & misi</button>

                                <div class="flex items-center">
                                    <input id="<?= $chief->id_ketua; ?>" value="<?= $chief->id_ketua; ?>" name="id_ketua" type="radio" class="select-candidates focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                    <label for="<?= $chief->id_ketua; ?>" class="ml-2">Pilih</label>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="page" class="hidden">
                <div class="grid gap-5 mx-auto md:grid-cols-2 max-w-full">
                    <?php $i = 0 ?>
                    <?php foreach ($wakil as $vice) : ?>
                        <!-- <div class="overflow-hidden transition-shadow duration-300 rounded-md shadow">
                            <div class="relative" style="padding-top: 100%;">
                                <img src="<= base_url("/img/$vice->image"); ?>" class="object-cover absolute top-0 w-full h-full bg-light-surf dark:bg-dark-surf" alt="" />
                            </div>
                            <div class="py-5 flex flex-col px-4">
                                <div>
                                    <p class="mb-2 text-xs font-semibold uppercase text-red-600">
                                        Calon Ketua
                                    </p>
                                </div>
                                <div>
                                    <p class="text-base font-bold"><= $vice->name; ?></p>
                                </div>
                                <div class="text-sm mb-2">
                                    <p><= $vice->class; ?></p>
                                </div>
                                <div class="flex items-center">
                                    <input value="<= $vice->id_wakil; ?>" name="id_wakil" type="radio" class="select-candidates focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                </div>

                            </div>
                        </div> -->
                        <div class="overflow-hidden rounded-md shadow">
                            <div class="relative" style="padding-top: 100%;">
                                <img src="<?= base_url("/img/$vice->image"); ?>" class="object-cover absolute top-0 w-full h-full" alt="" />
                            </div>
                            <div class="py-5 flex flex-col px-4">
                                <div>
                                    <p class="mb-2 text-xs font-semibold uppercase text-red-600">
                                        Calon Wakil
                                    </p>
                                </div>
                                <div>
                                    <p class="text-base font-bold"><?= $vice->name; ?></p>
                                </div>
                                <div class="text-sm mb-4">
                                    <p><?= $vice->class; ?></p>
                                </div>
                                <button type="button" onclick="openDialogVisiMisi(<?= $i++; ?>, 'WAKIL')" class="mb-2 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:w-auto sm:text-sm">Visi & misi</button>

                                <div class="flex items-center">
                                    <input id="<?= $vice->name; ?>" value="<?= $vice->id_wakil; ?>" name="id_wakil" type="radio" class="select-candidates focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                    <label for="<?= $vice->name; ?>" class="ml-2">Pilih</label>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="page" class="hidden">
                <div>
                    <p class="text-semibold text-3xl leading-normal">Konfirmasi</p>
                    <p class="leading-normal mb-4">Apakah Anda sudah yakin dengan pilihan Anda? Pilihan Anda tidak dapat diubah kembali setelah mengirim.</p>
                    <input id="cofirmVote" name="konfirmasi" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                    <span class="ml-2">Saya sudah memilih dengan benar.</span>
                </div>
            </div>

            <div class="mt-4">
                <button onclick="movePage(-1)" id="prevButton" class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none w-auto sm:text-sm" type="button">Kembali</button>
                <button onclick="movePage(1)" id="nextButton" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none w-auto sm:text-sm" type="button">Berikutnya</button>
            </div>

        </form>
    </div>


    <div id="dialog" class="fixed z-50 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Pilih kandidat
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Pilih salah satu kandidat.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button onclick="closeDialog()" type="button" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                        Oke
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- confirm dialog -->
    <div id="dialogConfirm" class="fixed z-50 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Konfirmasi pilihan Anda.
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Anda perlu mengonfirmasi pilihan Anda sebelum mengirim.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button onclick="closeDialogConfirm()" type="button" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Visi Misi Dialog -->
    <div id="dialogVisiMisi" class="fixed z-50 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Visi
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500" id="visi">

                                </p>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Misi
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500" id="misi">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button onclick="closeDialogVisiMisi()" type="button" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
        const dialog = document.querySelector('#dialog')
        const closeDialog = () => dialog.classList.add('hidden')
        const openDialog = () => dialog.classList.remove('hidden')

        const dialogConfirm = document.querySelector('#dialogConfirm')
        const closeDialogConfirm = () => dialogConfirm.classList.add('hidden')
        const openDialogConfirm = () => dialogConfirm.classList.remove('hidden')

        const dialogVisiMisi = document.querySelector('#dialogVisiMisi')
        const closeDialogVisiMisi = () => dialogVisiMisi.classList.add('hidden')

        const API_URL_KETUA = 'http://localhost:8080/ketua'
        const API_URL_WAKIL = 'http://localhost:8080/wakil'

        const visi = document.querySelector('#visi')
        const misi = document.querySelector('#misi')

        async function openDialogVisiMisi(params, jab) {
            dialogVisiMisi.classList.remove('hidden')
            const index = await params
            const jabatan = await jab

            if (jab === 'KETUA') {
                const res = await fetch(API_URL_KETUA)
                const data = await res.json()
                visi.innerHTML = await data[index].visi
                misi.innerHTML = await data[index].misi
            } else {
                const res = await fetch(API_URL_WAKIL)
                const data = await res.json()
                visi.innerHTML = await data[index].visi
                misi.innerHTML = await data[index].misi
            }

        }



        let currentTab = 0
        showTab(currentTab)

        function showTab(n) {
            let x = document.querySelectorAll("#page")
            x[n].style.display = "block"

            if (n == 0) {
                document.querySelector("#prevButton").style.display = "none"
            } else {
                document.querySelector("#prevButton").style.display = "inline"
            }
            if (n == (x.length - 1)) {
                document.querySelector("#nextButton").innerHTML = "Kirim"
            } else {
                document.querySelector("#nextButton").innerHTML = "Berikutnya"
            }
            fixStepIndicator(n)
        }

        function movePage(n) {
            let x = document.querySelectorAll("#page")

            if (n == 1 && !validateForm()) return false;

            x[currentTab].style.display = "none"
            currentTab = currentTab + n

            if (currentTab >= x.length) {
                document.querySelector("#vote").submit()
                return false;
            }
            showTab(currentTab)
        }

        function validateForm() {
            let x, y, i, valid = false
            x = document.querySelectorAll("#page")
            y = x[currentTab].querySelectorAll(".select-candidates")
            confirm = document.querySelector("#cofirmVote")

            if (currentTab == x.length - 1) {
                if (confirm.checked) {
                    valid = true
                }

                if (!valid) {
                    openDialogConfirm()
                }
            } else {
                for (i = 0; i < y.length; i++) {
                    if (y[i].checked) {
                        valid = true
                    }
                }
                if (!valid) {
                    openDialog()
                }
            }

            return valid
        }

        function fixStepIndicator(n) {
            let i, x = document.querySelectorAll("#step")
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" text-red-600 border-red-600", "")
            }
            x[n].className += " text-red-600 border-red-600"
        }
    </script>
</body>

</html>