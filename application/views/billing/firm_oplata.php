<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('billing/') ?>">Все фирмы</a></li>
        <li><a href="<?php echo site_url("billing/firm/{$r->id}"); ?>"><?php echo $r->dogovor; ?></a>
        </li>
        <li class="active">Оплата</li>
    </ol>
</div>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <table class="table table-hover table-condensed table-bordered">
            <caption>Оплата за период по организации #<?php echo $r->dogovor.' '.$r->name; ?></caption>
            <thead>
            <tr>
                <th style='width: 100px'>Дата</th>
                <th>Номер счета</th>
                <th>Расшифровка счета</th>
                <th>Оплата с НДС</th>
                <th>НДС</th>
            </thead>
            <tbody>
            <?php foreach ($firm_oplata as $o): ?>
                <tr>
                    <td><?php echo $o->data; ?></td>
                    <td><?php echo $o->number; ?></td>
                    <td><?php echo $o->name; ?></td>
                    <td class="td-number"><?php echo prettify_number($o->value * ($o->nds + 100) / 100); ?></td>
                    <td class="td-number"><?php echo prettify_number($o->value * $o->nds / 100); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>