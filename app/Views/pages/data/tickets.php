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
            <button data-modal-target="staticModal" data-modal-toggle="staticModal" type="button" class="px-4 py-2 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                <i class="fa-sharp fa-solid fa-plus"></i>
                <span> New Ticket</span>
            </button>
        </div>
    </div>
    <div class="p-4 bg-white">
        <div class="overflow-x-auto">
            <table class="w-full table-auto bg-[#fdf9e7]">
                <thead class="bg-[#482121] text-white">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Summary</th>
                        <th class="px-4 py-2">Assignee</th>
                        <th class="px-4 py-2">Creator</th>
                        <th class="px-4 py-2">Organization</th>
                        <th class="px-4 py-2">Priority</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Created</th>
                        <th class="px-4 py-2">Updated</th>
                        <th class="px-4 py-2">Due Date</th>
                        <th class="px-4 py-2">Response Time</th>
                        <th class="px-4 py-2">Close Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($tickets) :
                    ?>
                        <?php foreach ($tickets as $row) : ?>
                            <tr id="rowTicket" onclick="showTicket(<?= $row['id']; ?>)" data-ticket="<?= $row['id']; ?>" class="hover:bg-[#fcf5d9] cursor-pointer">
                                <td class="px-4 py-2"><?= $row['id'] ?></td>
                                <td class="px-4 py-2"><?= $row['summary'] ?></td>
                                <td class="px-4 py-2"><?= $row['assignee'] ?></td>
                                <td class="px-4 py-2"><?= $row['creator'] ?></td>
                                <td class="px-4 py-2"><?= $row['organization'] ?></td>
                                <td class="px-4 py-2"><?= $row['priority'] ?></td>
                                <td class="px-4 py-2"><?= $row['category'] ?></td>
                                <td class="px-4 py-2"><?= $row['created_at'] ?></td>
                                <td class="px-4 py-2"><?= $row['updated_at'] ?></td>
                                <td class="px-4 py-2"><?= $row['due_date'] ?></td>
                                <td class="px-4 py-2"><?= $row['response_time'] ?></td>
                                <td class="px-4 py-2"><?= $row['close_time'] ?></td>
                                <td width="125" class="flex flex-col content-center justify-center px-4 py-2">
                                    <a href="/organization/edit/<?= $row['id'] ?>" class="bg-yellow-500 px-3 py-1 transition-[background-color] hover:bg-yellow-400">
                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                        Edit
                                    </a>
                                    <button class="mt-2 bg-red-500 px-3 py-1 transition-[background-color] hover:bg-red-400" onclick="deleteButton(<?= $row['id'] ?>)">
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