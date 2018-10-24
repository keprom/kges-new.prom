<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('billing/') ?>">Все фирмы</a></li>
        <li><a href="<?php echo site_url("billing/firm/{$r->id}"); ?>"><?php echo $r->dogovor; ?></a>
        </li>
        <li class="active">Месяц выдачи счет фактуры</li>
    </ol>
</div>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <fieldset>
            <legend>Месяц выдачи счет фактуры</legend>
        <form action="<?php echo site_url('billing/pre_sf2'); ?>" method="get" class="form-horizontal">
            <div class="form-group">
                <input type="hidden" name="firm_id" value="<?php echo $r->id; ?>">
                <div class="col-sm-6">
                    <select name="period_id" class="form-control" id="">
                        <?php foreach ($period as $p): ?>
                            <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    <input type="submit" class="btn btn-primary btn-block" value="Открыть">
                </div>
            </div>
        </form>
        </fieldset>
    </div>
</div>
