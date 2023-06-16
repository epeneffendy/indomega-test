<?= $this->extend('admin/layouts/main_layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Data <small><?= $title ?></small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('failed')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('failed') ?>
                            </div>
                        <?php endif; ?>
                        <div class="pull-right">
                            <a href="<?= base_url('pricing/create') ?>" class="btn btn-success btn-sm mb-3">Create</a>
                        </div>
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Ship</th>
                                        <th>Flag Country</th>
                                        <th>Price Per Day</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($models) > 0) : ?>
                                        <?php foreach ($models as $item) :  ?>
                                            <tr>
                                                <td><?= $item->ship_name ?></td>
                                                <td><?= $item->flag ?></td>
                                                <td>Rp. <?= number_format($item->price_per_day) ?></td>
                                                <td>
                                                    <a href="<?= base_url('pricing/edit/' . $item->id) ?>" class="btn btn-primary btn-sm"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?= base_url('/pricing/delete/' . $item->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this data!')"><span class="fa fa-trash"></span></a>
                                                </td>

                                            </tr>
                                        <?php endforeach ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="3" style="text-align:center; color: red; font-style:italic">Data
                                                Not Found !</td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>