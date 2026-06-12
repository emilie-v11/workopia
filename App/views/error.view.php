<?php loadPartial('head'); ?>
<div style="min-height:100vh; display:flex; flex-direction:column;">
  <?php loadPartial('header'); ?>

  <section class="flex-1 flex items-center justify-center" style="flex:1; display:flex; align-items:center; justify-content:center;">
    <div class="container mx-auto p-4">
      <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3"><?= $status ?? 'Unknown' ?> Error</div>
      <p class="text-center text-2xl mb-4">
        <?= $message ?? 'An error occurred' ?>
      </p>
    </div>
  </section>
</div>

<?php loadPartial('footer'); ?>