<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="table-responsive-lg">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>شماره</th>
                        <th>نام غذا</th>
                        <th>تعداد</th>
                        <th>قیمت (تومان)</th>
                        <th>قابل پرداخت (تومان)</th>
                        <?php if (!isset($show_delete)) : ?>
                            <th>حذف کردن</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order->showItems() as $key => $item) : ?>
                        <tr>
                            <td><?= $key += 1 ?></td>
                            <td><?= $item->productName ?></td>
                            <td><?= $item->count ?></td>
                            <td><?= number_format($item->amount) ?></td>
                            <td><?= number_format($item->payable()); ?></td>
                            <?php if (!isset($show_delete)) : ?>
                                <td>
                                    <form action="<?= route('cart', 'remove') ?>" method="post" class="d-inline">
                                        <button type="submit" class="btn btn-danger btn-sm" name="id" value="<?= $item->id ?>">
                                            <i class="fa fa-trash ml-1"></i>
                                        </button>
                                    </form>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="4">مجموع قابل پرداخت</th>
                        <th><?= number_format($order->total) ?></th>
                        <?php if (!isset($show_delete)) : ?>
                            <th>-</th>
                        <?php endif; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>