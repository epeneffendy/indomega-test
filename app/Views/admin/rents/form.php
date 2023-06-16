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
                    <form class="form-horizontal form-label-left" action="<?= base_url('/rents/save') ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="checkbox" <?= ($isNewRecord) ? "checked" : "" ?> name="isNewRecord" hidden />
                        <input type="hidden" name="id" class="form-control " value="<?= @$model->id  ?>">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Ship</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select class="form-control select2" name="ship_id" id="ship_id">
                                    <option value="">Choose option</option>
                                    <?php foreach ($ships as $item) : ?>
                                    <option value="<?= $item->ship_id ?>"
                                        <?= (@$model->ship_id) ? ($model->ship_id == $item->ship_id) ? 'selected' : '' : '' ?>>
                                        <?= $item->ship_name ?></option>
                                    <?php endforeach ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Price</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" name="price_ship" class="form-control " value="" id="price_ship"
                                    readOnly>
                                <input type="hidden" name="pricing_id" class="form-control " value="" id="pricing_id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Start Rental</label>
                            <div class="col-md-9 col-sm-9 col-xs-9 xdisplay_inputx form-group row has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal1"
                                    placeholder="Rental Start" aria-describedby="inputSuccess2Status" name="rent_start">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Duration in Day</label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <input type="number" name="duration_in_day" class="form-control " value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Ship Charter</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" name="renter" class="form-control " value="">
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-9">
                                <a href="<?= base_url('/rents'); ?>" class="btn btn-sm btn-primary">Cancel</a>
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