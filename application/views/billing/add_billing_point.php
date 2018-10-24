<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Новая точка учета</h3></div>
            <div class="panel-body">
                <form action="<?php echo site_url("billing/adding_point") ?>" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="" class="control-label col-sm-6">Наименование точки учета</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-sm-6">Адрес точки учета</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-sm-3">Наименование ТП</label>
                        <div class="col-sm-3">
                            <select name='tp_id' class="form-control" id="select-tp">
                                <?php foreach ($tps->result() as $row): ?>
                                <option value=<?php echo $row->id; ?>><?php echo $row->name; ?></td></tr>
                                    <?php endforeach; ?>
                                </option>
                            </select>
                        </div>
                        <label for="" class="control-label col-sm-3">Фазность</label>
                        <div class="col-sm-3">
                            <select class="form-control" name='phase'>
                                <option value=1>Однофазный</option>
                                <option value=3>Трехфазный</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="hidden" name='firm_id' value=<?php echo $firm_id; ?>>
                            <input class="form-control btn-primary" type='submit' value='Добавить  точку учета'>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>