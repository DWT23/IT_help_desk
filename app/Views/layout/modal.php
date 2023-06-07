<!-- Main modal -->
<div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Create a Ticket
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="px-6 py-6 lg:px-8">
                <form class="space-y-6" action="/ticket/create" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div>
                        <select id="organizations" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="organization" autofocus required>
                            <option selected disable>Select Organizations</option>
                        </select>
                    </div>
                    <div>
                        <select id="employees" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white employees" name="creator" required>
                            <option value="" selected disable>Select Contact</option>
                        </select>
                    </div>
                    <div>
                        <input type="text" name="summary" id="summary" placeholder="Summary (required)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div class="relative">
                        <textarea name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" oninput="checkTextarea()"></textarea>
                        <label id="focusLabel" for="description" class="absolute left-[10px] top-[10px] transition-all duration-150">Description</label>
                    </div>
                    <div>
                        <select id="assigned" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white assigned" name="assignee">
                            <option selected disable>Assigned By:</option>
                        </select>
                    </div>
                    <div class="flex content-center justify-between p-2.5">
                        <label for="last_name" class="w-[15%] py-2.5">Priority</label>
                        <ul class="w-[85%] flex">
                            <li>
                                <input type="radio" id="highPrior" name="priority" value="high" class="hidden peer">
                                <label for="highPrior" class="p-2.5 inline-flex items-center justify-between text-gray-500 bg-white border border-gray-200 cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 rounded-l">
                                    High
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="mediumPrior" name="priority" value="medium" class="hidden peer">
                                <label for="mediumPrior" class="p-2.5 inline-flex items-center justify-between text-gray-500 bg-white border border-gray-200 cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                    Medium
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="lowPrior" name="priority" value="low" class="hidden peer">
                                <label for="lowPrior" class="p-2.5 inline-flex items-center justify-between text-gray-500 bg-white border border-gray-200 cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100  rounded-r">
                                    Low
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="category" required>
                            <option value="Unspecified" selected>Unspecified</option>
                            <option value="Email">Email</option>
                            <option value="Hardware">Hardware</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="NetWork">NetWork</option>
                            <option value="Other">Other</option>
                            <option value="Printer">Printer</option>
                            <option value="Software">Software</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="attach_file">Attach a file</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="attach_file" id="attach_file" type="file">
                    </div>
                    <div class="flex justify-end">
                        <button class="p-2 border border-slate-600 rounded-sm hover:bg-slate-200 mr-4" data-modal-hide="staticModal">Cancel</button>
                        <button class="p-2 bg-blue-600 rounded-sm hover:bg-blue-500 text-white font-medium">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>