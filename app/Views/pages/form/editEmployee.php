<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<section class="mt-5 flex w-full flex-col gap-y-2">
    <form class="w-full bg-white" method="post" action="/users/edit/<?= $employee['nip'] ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <input type="hidden" name="pk" value="nip">
        <div class=" bg-slate-200 p-3">
            <h3 class="font-bold">Edit <span class="font-normal">Employee</span></h3>
        </div>
        <div class="flex content-center justify-between p-4">
            <label for="first_name" class="w-1/4 p-2">FirstName</label>
            <div class="w-9/12 flex flex-col justify-start relative">
                <input type="text" class="border p-2 <?= session('errors.first_name') ? 'focus:outline-red-500' : 'focus:outline-blue-500' ?>" id="first_name" name="first_name" placeholder="Insert FirstName" value="<?= $employee['first_name'] ?>" <?= session('errors.first_name') ? 'autofocus' : '' ?> required>

                <?php if (session('errors.last_name')) : ?>
                    <p class="absolute bg-red-500 text-white px-4 -bottom-[55%]"><?= session('errors.first_name') ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex content-center justify-between p-4">
            <label for="last_name" class="w-1/4 p-2">LastName</label>
            <div class="w-9/12 flex flex-col justify-start relative">
                <input type="text" class="border p-2 <?= session('errors.last_name') ? 'focus:outline-red-500' : 'focus:outline-blue-500' ?>" id="last_name" name="last_name" placeholder="Insert LastName" value="<?= $employee['last_name'] ?>" <?= session('errors.last_name') ? 'autofocus' : '' ?>>

                <?php if (session('errors.last_name')) : ?>
                    <p class="absolute bg-red-500 text-white px-4 -bottom-[55%]"><?= session('errors.last_name') ?></p>
                <?php endif; ?>

            </div>
        </div>
        <div class="flex content-center justify-between p-4">
            <label for="photo" class="w-1/4 p-2">Picture</label>
            <div class="w-9/12 flex flex-col justify-start relative">
                <input class="w-9/12" type="file" name="photo" id="photo">
                <?php if (session('errors.photo')) : ?>
                    <p class="absolute bg-red-500 text-white px-4 -bottom-[55%]"><?= session('errors.photo') ?></p>
                <?php endif; ?>
                <input type="hidden" name="old_photo" value="<?= $employee['photo'] ?>">
            </div>
        </div>
        <div class="flex content-center justify-between p-4">
            <label for="phone_number" class="w-1/4 p-2">Phone Number</label>
            <div class="w-9/12 flex flex-col justify-start relative">
                <input type="tel" class="border p-2 <?= session('errors.phone_number') ? 'focus:outline-red-500' : 'focus:outline-blue-500' ?>" id="phone_number" name="phone_number" placeholder="Insert Phone Number" value="<?= $employee['phone_number'] ?>" <?= session('errors.phone_number') ? 'autofocus' : '' ?> pattern="0[0-9]{12-14}">

                <?php if (session('errors.phone_number')) : ?>
                    <p class="absolute bg-red-500 text-white px-4 -bottom-[55%]"><?= session('errors.phone_number') ?></p>
                <?php endif; ?>

            </div>
        </div>
        <div class="flex content-center justify-between p-4">
            <label for="alamat" class="w-1/4 p-2">Address</label>
            <div class="w-9/12 flex flex-col justify-start relative">
                <textarea type="text" class="border p-2 <?= session('errors.alamat') ? 'focus:outline-red-500' : 'focus:outline-blue-500' ?>" id="alamat" name="alamat" placeholder="Insert Address" <?= session('errors.alamat') ? 'autofocus' : '' ?> required><?= $employee['address'] ?></textarea>


                <?php if (session('errors.alamat')) : ?>
                    <p class="absolute bg-red-500 text-white px-4 -bottom-[25px]"><?= session('errors.alamat') ?></p>
                <?php endif; ?>

            </div>
        </div>
        <div class="flex content-center justify-between p-4">
            <label for="email" class="w-1/4 p-2">Email</label>
            <div class="w-9/12 flex flex-col justify-start relative">
                <input type="email" class="border p-2 <?= session('errors.email') ? 'focus:outline-red-500' : 'focus:outline-blue-500' ?>" id="email" name="email" placeholder="Insert Email" value="<?= $employee['email'] ?>" <?= session('errors.email') ? 'autofocus' : '' ?> required>

                <?php if (session('errors.email')) : ?>
                    <p class="absolute bg-red-500 text-white px-4 -bottom-[55%]"><?= session('errors.email') ?></p>
                <?php endif; ?>

            </div>
        </div>
        <div class="flex content-center justify-between p-4">
            <label for="username" class="w-1/4 p-2">Username</label>
            <div class="w-9/12 flex flex-col justify-start relative">
                <input type="text" class="border p-2 <?= session('errors.username') ? 'focus:outline-red-500' : 'focus:outline-blue-500' ?>" id="username" name="username" placeholder="Insert Username" value="<?= $employee['username'] ?>" <?= session('errors.username') ? 'autofocus' : '' ?> required>

                <?php if (session('errors.username')) : ?>
                    <p class="absolute bg-red-500 text-white px-4 -bottom-[55%]"><?= session('errors.username') ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex content-center justify-between p-4">
            <label for="password" class="w-1/4 p-2">Password</label>
            <div class="w-9/12 flex flex-col justify-start relative">
                <input type="text" class="border p-2 <?= session('errors.password') ? 'focus:outline-red-500' : 'focus:outline-blue-500' ?>" id="first_name" name="password" placeholder="Insert Password" value="<?= $employee['password'] ?>" <?= session('errors.password') ? 'autofocus' : '' ?> required>

                <?php if (session('errors.password')) : ?>
                    <p class="absolute bg-red-500 text-white px-4 -bottom-[55%]"><?= session('errors.password') ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="flex content-center p-4">
            <span class="w-1/4 p-2" for="select4">Birth of Date</span>
            <div class="w-9/12 flex">
                <label for="select-tanggal" class="p-2">Day</label>
                <select id="select-tanggal" class="mr-2 border p-2 <?= session('errors.tanggal') ? 'outline-red-500' : 'focus:outline-blue-500' ?>" name="tanggal" required>
                    <?php for ($i = 1; $i <= 31; $i++) : ?>
                        <option value="<?php echo $i; ?>" <?= $employee['tanggal'] === $i ? 'selected' : '' ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>

                <label for="select-bulan" class="p-2">Month</label>
                <select id="select-bulan" class="mr-2 border p-2 <?= session('errors.tanggal') ? 'outline-red-500' : 'focus:outline-blue-500' ?>" name="bulan" required>
                    <?php for ($i = 1; $i <= 12; $i++) : ?>
                        <option value="<?php echo $i; ?>" <?= $employee['bulan'] === $i ? 'selected' : '' ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>

                <label for="select-tahun" class="p-2">Year</label>
                <select id="select-tahun" class="border p-2 <?= session('errors.tanggal') ? 'outline-red-500' : 'focus:outline-blue-500' ?>" name="tahun" required>
                    <?php for ($i = 1900; $i <= 2023; $i++) : ?>
                        <option value="<?php echo $i; ?>" <?= $employee['tahun'] === $i ? 'selected' : '' ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>

        <div class="flex content-center justify-between p-4">
            <label for="gender" class="w-1/4 p-2">Gender</label>
            <select id="select-gender" class="mr-2 border p-2 w-9/12 <?= session('errors.tanggal') ? 'outline-red-500' : 'focus:outline-blue-500' ?>" name="gender" required>
                <option value="Male" <?= $employee['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= $employee['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
            </select>
        </div>

        <div class="bg-slate-200 p-3">
            <div class="ml-[25%]">
                <button class="bg-green-500 px-3 py-1 transition-[background-color] hover:bg-green-400" type="submit">
                    <i class="fa-sharp fa-solid fa-circle-dot"></i>
                    Submit
                </button>
                <button class="bg-red-500 px-3 py-1 transition-[background-color] hover:bg-red-400" type="reset">
                    <i class="fa-sharp fa-solid fa-ban"></i>
                    Reset
                </button>
            </div>
        </div>


    </form>
</section>

<?= $this->endSection() ?>