<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('../css/styles.css'); ?>" />
    <title>Admin Page</title>
</head>

<body class="min-h-full min-w-full bg-slate-200 relative">
    <div class="flex flex-row">
        <!-- Left panel -->
        <aside class="fixed left-0 z-10 h-screen max-h-screen w-1/5 overflow-y-auto bg-[#FFF7D4]">
            <nav class="mb-5 flex flex-col text-[#4C3D3D]">
                <div class="mt-4 text-center">
                    <a href="#" class="text-xl">
                        IT
                        <span class="font-bold">Development</span>
                    </a>
                </div>
                <span class="mt-5 block border border-slate-500"></span>
                <ul class="mt-3 px-6">
                    <li class="relative w-full py-4 transition-all duration-500 hover:text-[#9CA777]">
                        <a href="#" class="relative flex content-center justify-between">
                            <i class="fa-sharp fa-solid fa-handshake-angle relative top-1 align-middle"></i>
                            <div class="flex w-9/12 justify-between">
                                <h3>Help Desk</h3>
                            </div>
                        </a>
                    </li>

                    <span class="rounded-sm border-b-2 border-slate-500 block"></span>
                    <li class="relative w-full py-4 transition-all duration-500 hover:text-[#9CA777]">
                        <a href="/dashboard" class="relative flex content-center justify-between">
                            <i class="fa-sharp fa-solid fa-gauge-simple relative top-1 align-middle"></i>
                            <div class="w-9/12 justify-between">
                                <h3>Dashboard</h3>
                            </div>
                        </a>
                    </li>
                    <li class="relative w-full pb-4 transition-all duration-500 hover:text-[#9CA777]">
                        <a href="/tickets" class="relative flex content-center justify-between">
                            <i class="fa-sharp fa-solid fa-ticket relative top-1"></i>
                            <div class="w-9/12 justify-between">
                                <h3>Tickets</h3>
                            </div>
                        </a>
                    </li>
                    <!-- <li class="relative w-full pb-4 transition-all duration-500 hover:text-[#9CA777]">
                        <a href="#" class="relative flex content-center justify-between">
                            <i class="fa-sharp fa-solid fa-clipboard-list relative top-1"></i>
                            <div class="w-9/12 justify-between">
                                <h3>Knowledge Base</h3>
                            </div>
                        </a>
                    </li>
                    <li class="relative w-full pb-4 transition-all duration-500 hover:text-[#9CA777]">
                        <a href="#" class="relative flex content-center justify-between">
                            <i class="fa-sharp fa-solid fa-chart-line relative top-1"></i>

                            <div class="w-9/12 justify-between">
                                <h3>Reports</h3>
                            </div>
                        </a>
                    </li>
                    <li class="relative w-full pb-4 transition-all duration-500 hover:text-[#9CA777]">
                        <a href="#" class="relative flex content-center justify-between">
                            <i class="fa-sharp fa-solid fa-download relative top-1"></i>

                            <div class="w-9/12 justify-between">
                                <h3>Exports</h3>
                            </div>
                        </a>
                    </li> -->

                    <span class="rounded-sm border-b-2 border-slate-500 block"></span>
                    <li class="relative w-full py-4 transition-all duration-500 hover:text-[#9CA777]">
                        <a href="/users" class="relative flex content-center justify-between">
                            <i class="fa-sharp fa-solid fa-users relative top-1 align-middle"></i>
                            <div class="w-9/12 justify-between">
                                <h3>Users</h3>
                            </div>
                        </a>
                    </li>

                    <li class="relative w-full pb-4 transition-all duration-500 hover:text-[#9CA777]">
                        <a href="/organization" class="relative flex content-center justify-between">
                            <i class="fa-sharp fa-solid fa-sitemap relative top-1 align-middle"></i>
                            <div class="w-9/12 justify-between">
                                <h3>Organization</h3>
                            </div>
                        </a>
                    </li>

                    <span class="rounded-sm border-b-2 border-slate-500 block"></span>
                    <!-- <li class="relative w-full py-4 transition-all duration-500 hover:text-[#9CA777]">
                        <a href="#" onclick="toggleSubnav(4)" class="relative flex w-full content-center justify-between">
                            <i class="fa-sharp fa-solid fa-gears relative top-1"></i>

                            <div class="relative flex w-9/12 justify-between">
                                <h3>Settings</h3>
                            </div>
                        </a>
                    </li>
                    <li class="relative w-full pb-4">
                        <button href="#" onclick="toggleSubnav(5)" class="relative flex w-full content-center justify-between transition-all duration-500 hover:text-[#9CA777]">
                            <i class="fa-sharp fa-solid fa-desktop relative top-1"></i>

                            <div class="relative flex w-9/12 justify-between">
                                <h3>Layanan</h3>
                                <i id="angle5" class="fa-sharp fa-solid fa-angle-right absolute right-0 top-1  transition-all"></i>
                            </div>
                        </button>
                        <ul id="subnav5" class="ml-[25%] mt-5 hidden">
                            <li class="subnav-item transition-all duration-500 hover:text-[#9CA777]">
                                <a href="#">
                                    <i class="fa-sharp fa-solid fa-sign"></i>
                                    Register
                                </a>
                            </li>
                        </ul>
                    </li> -->

                </ul>
            </nav>
        </aside>
        <!-- Main Panel -->
        <main class="ml-[20%] flex min-h-screen w-4/5 flex-col pb-4">
            <header class="flex h-14 w-full content-center items-center justify-between bg-[#F7E1AE] px-6 py-1">
                <div class="">
                    <!-- <button><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button> -->
                </div>
                <div class="relative cursor-pointer" onclick="toggleSubnav(6)">
                    <img src="<?= base_url() ?>/img/uploads/<?= session()->get('photo') ?>" alt="User" class="h-10 w-10 rounded-full bg-black" />

                    <!-- Dropdown List -->
                    <ul id="subnav6" class="dropdown absolute right-0 mt-2 hidden w-32 min-w-[10%] rounded-md bg-slate-800 px-4 py-2 text-slate-300 shadow-lg [&>li>a:hover]:text-white [&>li>a]:transition-colors">
                        <li class="my-2">
                            <a href="#">
                                <i class="fa-sharp fa-solid fa-gear mr-2"></i>
                                Setting
                            </a>
                        </li>
                        <li class="my-2">
                            <a href="/logout">
                                <i class="fa-sharp fa-solid fa-power-off mr-2"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </header>
            <div class="mt-2 flex h-10 w-full items-center justify-start bg-white px-6 font-semibold">
                <h2>Dashboard</h2>
            </div>
            <div class="mt-2 w-full px-6">
                <?= $this->renderSection('content'); ?>

                <?= $this->include('features/tiketLog') ?>
            </div>
            <?= $this->include('layout/modal') ?>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('../js/sweet.js') ?>"></script>
    <script src="<?= base_url('../js/fetch.js') ?>"></script>
    <script src="<?= base_url('../js/main.js') ?>"></script>
</body>

</html>