<div class="row">
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo site_url('billing/') ?>">Все фирмы</a>
        </li>
        <li>
            <a href="<?php echo site_url("billing/firm/{$firm->id}"); ?>"><?php echo $firm->dogovor; ?></a>
        </li>
        <li>
            <a href="<?php echo site_url("billing/pre_sf/{$firm->id}"); ?>">Месяц выдачи счет-фактуры</a>
        </li>
        <li class="active">Поля счет-фактуры</li>
    </ol>
</div>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <fieldset>
            <legend>Поля счет-фактуры</legend>
            <form action="<?php echo site_url('billing/sf') ?>" class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">Подпись</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="signer_id" id="">
                            <?php foreach ($signer as $s): ?>
                                <option value="<?php echo $s->id; ?>"><?php echo $s->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">Накладная</label>
                    <div class="col-sm-6">
                        <input type="checkbox" name="nakl" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">Номер счет-фактуры</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="schet2" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">Дата выдачи счет-фактуры</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="data_schet" type="text" value="<?php echo $r->date; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">Номер накладной</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="schet_nakl" type="text" value="<?php echo $r->schet_nakl; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">Дата выдачи накладной
                    </label>
                    <div class="col-sm-6">
                        <input class="form-control" name="data_nakl" type="text" value="<?php echo $r->data_nakl; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">
                        Условия оплаты по договору
                    </label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="edit1" value="<?php echo $firm->edit1; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">
                        Пункт назначения поставляемых товаров (работ, услуг)
                    </label>
                    <div class="col-sm-6">
                        <input class="form-control" name="edit2" type="text" value="<?php echo $firm->edit2; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">
                        Поставка товаров осуществлена по доверености
                    </label>
                    <div class="col-sm-6">
                        <input class="form-control" name="edit3" type="text" value="<?php echo $firm->edit3; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">
                        Способ отправления
                    </label>
                    <div class="col-sm-6">
                        <input class="form-control" name="edit4" type="text" value="<?php echo $firm->edit4; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">
                        Грузоотправитель
                    </label>
                    <div class="col-sm-6">
                        <input class="form-control" name="edit5" type="text" value="<?php echo ''; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">
                        Грузополучатель
                    </label>
                    <div class="col-sm-6">
                        <input class="form-control" name="edit6" type="text" value="<?php echo $firm->edit6; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">
                        Отправитель
                    </label>
                    <div class="col-sm-6">
                        <input class="form-control" name="edit7" type="text" value="<?php echo $firm->edit7; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">
                        Адрес отправителя
                    </label>
                    <div class="col-sm-6">
                        <input class="form-control" name="edit8" type="text" value="<?php echo $firm->edit8; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-6">
                        Номер договора со всякой фигней
                    </label>
                    <div class="col-sm-6">
                        <input class="form-control" name="dog2" type="text" value="<?php echo $firm->dog2; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-6">
                        <input type="submit" class="form-control btn btn-block btn-primary" value="Открыть">
                        <input type="hidden" name="period_id" value="<?php echo $period_id; ?>">
                        <input type="hidden" name="firm_id" value="<?php echo $firm_id; ?>">
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</div>
