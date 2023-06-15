<?= $this->include('admin/layouts/main_header') ?>
<?= $this->include('admin/layouts/main_nav') ?>
<?= $this->include('admin/layouts/main_left') ?>

<div class="right_col" role="main">
    <?= $this->renderSection('content') ?>
</div>

<?= $this->include('admin/layouts/main_footer') ?>