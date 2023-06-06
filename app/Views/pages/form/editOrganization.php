<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<section class="mt-5 flex w-full flex-col gap-y-2">
    <form class="w-full bg-white" method="post" action="/organization/edit/<?= $organization['id'] ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <input type="hidden" name="pk" value="nip">
        <div class=" bg-slate-200 p-3">
            <h3 class="font-bold">Edit <span class="font-normal">Organization</span></h3>
        </div>
        <div class="flex content-center justify-between p-4">
            <label for="name" class="w-1/4 p-2">Name</label>
            <div class="w-9/12 flex flex-col justify-start relative">
                <input type="text" class="border p-2 <?= session('errors.name') ? 'focus:outline-red-500' : 'focus:outline-blue-500' ?>" id="name" name="name" placeholder="Insert Name" value="<?= $organization['name'] ?>" <?= session('errors.name') ? 'autofocus' : '' ?> required>

                <?php if (session('errors.name')) : ?>
                    <p class="absolute bg-red-500 text-white px-4 -bottom-[55%]"><?= session('errors.name') ?></p>
                <?php endif; ?>
            </div>
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