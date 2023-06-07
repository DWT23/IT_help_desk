<section class="absolute hidden bottom-0 shadow-lg mt-5 right-6 w-1/2" id="staticChat" aria-hidden="true">
    <!-- Header -->
    <div class="px-5 py-5 flex justify-between items-center bg-white border-b-2 w-full">
        <h3 class="font-bold"><span id="ticketId" class="before:content-['#']"></span> <span class="font-medium" id="ticketName"></span> </h3>
        <div class="flex">
            <button type="button" class="py-2.5 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Open</button>
            <div>
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    <svg class="w-5 h-6" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete Ticket</a>
                        </li>
                    </ul>
                </div>

            </div>
            <button onclick="toggleElement('sideChat')" class="h-10 w-10 border hover:border-slate-800 transition-all rounded-full ml-5">
                <i class="fa-sharp fa-solid fa-exclamation"></i>
            </button>

            <button onclick="toggleElement('staticChat')" class="h-10 w-10 border hover:border-slate-800 transition-all rounded-full ml-5">
                <i class="fa-sharp fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>

    <div class="flex flex-row justify-between bg-white h-[500px] max-h-[500px] w-full">
        <!-- Chat -->
        <div class="flex flex-col w-full justify-between">
            <div class="w-full flex flex-col justify-between overflow-y-auto relative">
                <div class="flex flex-col my-5 relative">
                    <!-- <div class="flex justify-end mb-4">
                        <div class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                            Welcome to group everyone !
                        </div>
                        <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600" class="object-cover h-8 w-8 rounded-full" alt="" />
                    </div>
                    <div class="flex justify-start mb-4">
                        <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600" class="object-cover h-8 w-8 rounded-full" alt="" />
                        <div class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat
                            at praesentium, aut ullam delectus odio error sit rem. Architecto
                            nulla doloribus laborum illo rem enim dolor odio saepe,
                            consequatur quas?
                        </div>
                    </div> -->

                    <div class="flex justify-between mb-4 w-full px-5" id="creatorInfo">
                        <div class="flex">
                            <img src="" class="object-cover h-8 w-8 rounded-full ticketCreatorImg" />
                            <div class="ml-2">
                                <span class="ticketCreatorName font-semibold"></span>
                                <input type="hidden" id="ticketCreatorNip">
                                <div class="text-slate-700 mt-2" id="ticketDescription"></div>
                            </div>
                        </div>
                        <!-- <div class="text-slate-500 hover:text-slate-800 cursor-pointer" onclick="thumb()">
                            <i class="fa-sharp fa-solid fa-thumbtack"></i>
                        </div> -->
                    </div>
                    <div class="flex justify-between mb-4 w-full bg-slate-100 px-5 py-2" id="creatorInfo">
                        <div class="flex">
                            <img src="" class="object-cover h-8 w-8 rounded-full ticketCreatorImg" />
                            <div class="ml-2 flex flex-col">
                                <span class="ticketCreatorName font-semibold"></span>
                                <p>Created the ticket</p>
                            </div>
                        </div>
                    </div>
                    <div id="message"></div>

                </div>
            </div>
            <form class="p-4" id="formChat" method="post">
                <?= csrf_field() ?>
                <input type="hidden" id="csrf" value="<?= csrf_hash(); ?>">
                <input class="w-full py-2 px-3 focus:outline-none" type="text" placeholder="Type a public response" id="chat" />
                <div class="flex justify-between mt-2">
                    <select id="filterChat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5" name="filterChat" required>
                        <option selected>Public Response</option>
                        <option selected>Internal Note</option>
                    </select>
                    <!-- <input type="file" name="" id="" class="content-none"> -->
                    <!-- <i class="fa-sharp fa-solid fa-paperclip"></i> -->
                    <div class="flex">
                        <button type="submit" class="py-2.5 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200" id="chatSend">Send</button>
                        <div class="relative">
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">
                                <svg class="w-5 h-6" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Sign out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-2/6 border-l-2 overflow-y-auto" id="sideChat">
            <aside id="sidebar-multi-level-sidebar" class="w-full" aria-label="Sidebar">
                <div class="h-full px-3 py-4 overflow-y-auto">
                    <ul class="space-y-2 font-medium">
                        <li>
                            <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="attributes" data-collapse-toggle="attributes">
                                <span class="flex-1 ml-1 text-left whitespace-nowrap" sidebar-toggle-item>Attributes</span>
                                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="attributes" class="hidden py-2 space-y-2">
                                <li class="relative">

                                    <label for="attrOrganizations" class="absolute text-xs bg-white px-1 left-2 -top-2 text-slate-500">Organization</label>
                                    <input type="text" id="attrOrganizations" class="border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="organization">
                                </li>
                                <li class="relative">
                                    <div class="mt-5">
                                        <label for="attrContact" class="absolute text-xs bg-white px-1 left-2 -top-2 text-slate-500">Contact</label>
                                        <input type="text" id="attrContact" class="border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="contact">
                                    </div>
                                </li>
                                <li class="relative">
                                    <div class="mt-5">
                                        <label for="attrAssignee" class="absolute text-xs bg-white px-1 left-2 -top-2 text-slate-500">Assignee</label>
                                        <input type="text" id="attrAssignee" class="border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="assignee">
                                    </div>
                                </li>
                                <li class="relative">
                                    <div class="mt-5">
                                        <label for="attrStatus" class="absolute text-xs bg-white px-1 left-2 -top-2 text-slate-500">Status</label>
                                        <input type="text" id="attrStatus" class="border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="status">
                                    </div>
                                </li>
                                <li class="relative">
                                    <div class="mt-5">
                                        <label for="attrPriority" class="absolute text-xs bg-white px-1 left-2 -top-2 text-slate-500">Priority</label>
                                        <input type="text" id="attrPriority" class="border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="priority">
                                    </div>
                                </li>
                                <li class="relative">
                                    <div class="mt-5">
                                        <label for="attrDueDate" class="absolute text-xs bg-white px-1 left-2 -top-2 text-slate-500">Due Dates</label>
                                        <input type="text" id="attrDueDate" class="border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="due_dates">
                                    </div>
                                </li>
                                <li class="relative">
                                    <div class="mt-5">
                                        <label for="attrCategory" class="absolute text-xs bg-white px-1 left-2 -top-2 text-slate-500">Category</label>
                                        <input type="text" id="attrCategory" class="border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="hardware">
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="task" data-collapse-toggle="task">
                                <span class="flex-1 ml-1 text-left whitespace-nowrap" sidebar-toggle-item>Task</span>
                                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="task" class="hidden py-2 space-y-2">
                                <li class="relative">
                                    <input type="text" id="attrOrganizations" class="border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="task" placeholder="Add a task">
                                </li>
                            </ul>
                        </li>
                        <li>
                            <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="time" data-collapse-toggle="time">
                                <span class="flex-1 ml-1 text-left whitespace-nowrap" sidebar-toggle-item>Time Spent</span>
                                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div id="time" class="hidden py-2 space-y-2">
                                <ul class="flex">
                                    <li>
                                        <input type="radio" id="high" name="priority" value="high" class="hidden peer" required>
                                        <label for="high" class="p-2.5 inline-flex items-center justify-between text-gray-500 bg-white border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 rounded-l">
                                            +15m
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="medium" name="priority" value="medium" class="hidden peer" required>
                                        <label for="medium" class="p-2.5 inline-flex items-center justify-between text-gray-500 bg-white border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            +30m
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="medium" name="priority" value="medium" class="hidden peer" required>
                                        <label for="medium" class="p-2.5 inline-flex items-center justify-between text-gray-500 bg-white border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            +1h
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="low" name="priority" value="low" class="hidden peer" required>
                                        <label for="low" class="p-2.5 inline-flex items-center justify-between text-gray-500 bg-white border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 rounded-r">
                                            Custom
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </div>
            </aside>
        </div>
    </div>
</section>
</div>