<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<section class="mt-5 flex w-full flex-col gap-y-2">
    <div class="flex justify-between bg-white p-4">
        <div class="w-2/12 pr-4">
            <select id="selectCategory" name="category" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
                <option value="Open"> Open </option>
                <option value="Waiting"> Waiting </option>
                <option value="Closed"> Closed </option>
                <option value="Unassigned"> Unassigned </option>
                <option value="My Tickets"> My Tickets </option>
                <option value="All"> All </option>
                <option value="Active Alerts"> Active Alerts </option>
                <option value="Past Due"> Past Due </option>
            </select>
        </div>
        <div class="w-3/4 flex items-center justify-end">
            <input type="text" name="search" placeholder="Search" class="w-1/2 px-3 py-2 mr-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
            <a href="/users/create" class="px-4 py-2 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                <i class="fa-sharp fa-solid fa-plus"></i>
                <span> New Employee</span>
            </a>
        </div>
    </div>
    <div class="p-4 bg-white">
        <div class="overflow-x-auto">
            <table class="w-full table-auto bg-[#fdf9e7]">
                <thead class="bg-[#482121] text-white">
                    <tr>
                        <th class="px-4 py-2">NIP</th>
                        <th class="px-4 py-2">Fullname</th>
                        <th class="px-4 py-2">Photo</th>
                        <th class="px-4 py-2">Phone Number</th>
                        <th class="px-4 py-2">Address</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Username</th>
                        <th class="px-4 py-2">Password</th>
                        <th class="px-4 py-2">Birth of Date</th>
                        <th class="px-4 py-2">Gender</th>
                        <th class="px-4 py-2">Created</th>
                        <th class="px-4 py-2">Updated</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($employee) :
                    ?>
                        <?php foreach ($employee as $row) : ?>
                            <tr>
                                <td class="px-4 py-2"><?= $row['nip'] ?></td>
                                <td class="px-4 py-2"><?= $row['fullname'] ?></td>
                                <td class="px-4 py-2">
                                    <img src="<?= base_url('img/uploads/' . $row['photo']); ?>" alt="Photo" class="w-10 h-full min-h-100% block">
                                </td>
                                <td class="px-4 py-2"><?= $row['phone_number'] ?></td>
                                <td class="px-4 py-2"><?= $row['address'] ?></td>
                                <td class="px-4 py-2"><?= $row['email'] ?></td>
                                <td class="px-4 py-2"><?= $row['username'] ?></td>
                                <td class="px-4 py-2"><?= $row['password'] ?></td>
                                <td class="px-4 py-2"><?= $row['birth_date'] ?></td>
                                <td class="px-4 py-2"><?= $row['gender'] ?></td>
                                <td class="px-4 py-2"><?= $row['created_at'] ?></td>
                                <td class="px-4 py-2"><?= $row['updated_at'] ?></td>
                                <td width="125" class="flex flex-col content-center justify-center px-4 py-2">
                                    <a href="/users/edit/<?= $row['nip'] ?>" class="bg-yellow-500 px-3 py-1 transition-[background-color] hover:bg-yellow-400">
                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                        Edit
                                    </a>
                                    <button class="mt-2 bg-red-500 px-3 py-1 transition-[background-color] hover:bg-red-400" onclick="deleteButton(<?= $row['nip'] ?>)">
                                        <i class="fa-sharp fa-solid fa-trash"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="100%" class="text-center py-4">
                                No Data Available
                            </td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Navigasi untuk menampilkan data lainnya -->
    <div class="flex w-full justify-between bg-white px-4 py-2">
        <div class="flex gap-1 p-2">
            Showing
            <span class="font-semibold">0</span>
            to
            <span class="font-semibold">0</span>
            of
            <span class="font-bold">0</span>
            results
        </div>
        <div class="flex content-center justify-center border border-b-slate-300 text-center ">
            <ul class="flex flex-row [&>*:hover]:bg-slate-400 [&>*:hover]:text-slate-50 [&>*:not(&>*:first-child)]:border-l-2 [&>*]:h-full [&>*]:min-h-[2rem] [&>*]:min-w-[3rem] [&>*]:border-slate-500 [&>*]:p-2 [&>button:last-of-type]:border-r-2 [&>i:first-child]:border-none [&>li]:cursor-pointer">
                <li>
                    <i class="fa-sharp fa-solid fa-angle-left"></i>
                </li>
                <li><button>1</button></li>
                <li><button>2</button></li>
                <li><button>3</button></li>
                <li><button>...</button></li>
                <li><button>8</button></li>
                <li><button>9</button></li>
                <li><button>10</button></li>
                <li>
                    <i class="fa-sharp fa-solid fa-angle-right"></i>
                </li>
            </ul>
        </div>
    </div>
</section>

<?= $this->endSection() ?>