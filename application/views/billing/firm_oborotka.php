<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('billing/') ?>">Все фирмы</a></li>
        <li><a href="<?php echo site_url("billing/firm/{$r->id}"); ?>"><?php echo $r->dogovor; ?></a>
        </li>
        <li class="active">Оборотка</li>
    </ol>
</div>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <table class="table table-bordered table-condensed table-hover">
            <caption>Оборотка по №<?php echo $r->dogovor.' '.$r->name; ?></caption>
            <tbody>
            <tr>
                <td>Сальдо на начало месяца</td>
                <td class="td-number"><?php echo prettify_number($saldo); ?></td>
            </tr>
            <tr>
                <td>Начислено</td>
                <td class="td-number"><?php echo prettify_number($nach); ?></td>
            </tr>
            <tr>
                <td>Оплачено</td>
                <td class="td-number"><?php echo prettify_number($oplata); ?></td>
            </tr>
            <tr>
                <td>Сальдо на конец месяца</td>
                <td class="td-number"><?php echo prettify_number($saldo+$nach-$oplata); ?></td>
            </tr>
            <tr>
                <td>С учетом предоплаты</td>
                <td class="td-number"><?php echo prettify_number($saldo+$nach-$oplata+$last_nach); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>