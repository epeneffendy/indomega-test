<?= $this->extend('admin/layouts/main_layout'); ?>

<?= $this->section('content'); ?>

<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= $title ?></h2>

            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" action="<?= base_url('/ships/save') ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="checkbox" <?= ($isNewRecord) ? "checked" : "" ?> name="isNewRecord" hidden />
                        <input type="hidden" name="id" class="form-control " value="<?= @$model->id  ?>">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Name</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" name="ship_name" class="form-control "
                                    value="<?= @$model->ship_name  ?>" autofocus>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Flag Country</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" name="flag" class="form-control " value="<?= @$model->flag  ?>">

                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-9">
                                <a href="<?= base_url('/ships'); ?>" class="btn btn-sm btn-primary">Cancel</a>
                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>