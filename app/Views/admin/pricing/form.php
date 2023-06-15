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
                    <form class="form-horizontal form-label-left" action="<?= base_url('/pricing/save') ?>"
                        method="post">
                        <?= csrf_field(); ?>
                        <input type="checkbox" <?= ($isNewRecord) ? "checked" : "" ?> name="isNewRecord" hidden />
                        <input type="hidden" name="id" class="form-control " value="<?= @$model->id  ?>">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Ship</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select class="form-control select2" name="ship_id">
                                    <option value="">Choose option</option>
                                    <?php foreach ($ships as $item) : ?>
                                    <option value="<?= $item->id ?>"><?= $item->ship_name ?></option>
                                    <?php endforeach ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Price Per Day</label>
                            <div class="col-md-9 col-sm-9 col-xs-9 form-group has-feedback">
                                <input type="number" name="price_per_day" class="form-control has-feedback-left"
                                    value="<?= @$model->price_per_day  ?> ">
                                <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-9">
                                <a href="<?= base_url('/pricing'); ?>" class="btn btn-sm btn-primary">Cancel</a>
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