<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('billing/') ?>">Все фирмы</a></li>
        <li class="active">Добавление фирмы</li>
    </ol>
</div>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Добавление</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo site_url("billing/adding_firm"); ?>" method="post"
                      class="form-horizontal">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Номер договора</label>
                        <div class="col-sm-6">
                            <input type="text" name="dogovor" class="form-control" value=''>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Наименование организации</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Адрес</label>
                        <div class="col-sm-6">
                            <input type="text" name="address" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group"><label for="" class="col-sm-6 control-label">Телефон</label>
                        <div class="col-sm-6">
                            <input type="text" name="telefon" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">РНН</label>
                        <div class="col-sm-6">
                            <input type="number" name="rnn" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Дата договора</label>
                        <div class="col-sm-6">
                            <input type="date" name="dogovor_date" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Имя директора</label>
                        <div class="col-sm-6">
                            <input type="text" name="director_name" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Адрес директора</label>
                        <div class="col-sm-6">
                            <input type="text" name="director_address" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Количество учредителей</label>
                        <div class="col-sm-6">
                            <input type="text" name="person" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Расчетный счет</label>
                        <div class="col-sm-6">
                            <input type="text" name="raschetnyy_schet" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">БИН</label>
                        <div class="col-sm-6">
                            <input type="text" name="bin" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Банк</label>
                        <div class="col-sm-6">
                            <select name="bank_id" id="" class="form-control">
                                <?php foreach ($bank as $b): ?>
                                    <option value="<?php echo $b->id; ?>"><?php echo $b->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Отрасль</label>
                        <div class="col-sm-6">
                            <select name="otrasl_id" id="" class="form-control">
                                <?php foreach ($firm_otrasl as $o): ?>
                                    <option value="<?php echo $o->id; ?>"><?php echo $o->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Группа</label>
                        <div class="col-sm-6">
                            <select name="subgroup_id" id="" class="form-control">
                                <?php foreach ($firm_subgroup as $s): ?>
                                    <option value="<?php echo $s->id; ?>"><?php echo $s->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Группа по потреблению</label>
                        <div class="col-sm-6">
                            <select name="firm_power_group_id" id="" class="form-control">
                                <?php foreach ($firm_power_group as $pg): ?>
                                    <option value="<?php echo $pg->id; ?>"><?php echo $pg->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Турэ</label>
                        <div class="col-sm-6">
                            <select name="ture_id" id="" class="form-control">
                                <?php foreach ($ture as $t): ?>
                                    <option value="<?php echo $t->id; ?>"><?php echo $t->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Куратор</label>
                        <div class="col-sm-6">
                            <select name="user_id" id="" class="form-control">
                                <?php foreach ($user as $u): ?>
                                    <option value="<?php echo $u->id; ?>"><?php echo $u->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label"></label>
                        <div class="col-sm-6 col-sm-offset-6">
                            <button class="btn btn-primary btn-block" type="submit">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
