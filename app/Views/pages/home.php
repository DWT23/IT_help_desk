<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="mt-5 flex flex-wrap justify-between gap-y-2">
    <div class="h-2/5 w-[23.33%] bg-cyan-500 p-4">Test</div>
    <div class="h-2/5 w-[23.33%] bg-indigo-500 p-4">Test</div>
    <div class="h-2/5 w-[23.33%] bg-rose-500 p-4">Test</div>
    <div class="h-2/5 w-[23.33%] bg-green-500 p-4">Test</div>

    <div class="h-2/5 w-1/2 border border-slate-500 bg-slate-300 p-4">Test</div>
    <div class="h-2/5 w-1/2 border border-slate-500 bg-slate-300 p-4">Test</div>
</section>
<?= $this->endSection('content'); ?>