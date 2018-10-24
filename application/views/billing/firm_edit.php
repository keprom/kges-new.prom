<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('billing/') ?>">Все фирмы</a></li>
        <li><a href="<?php echo site_url("billing/firm/{$r->id}"); ?>"><?php echo $r->dogovor; ?></a>
        </li>
        <li class="active">Данные фирмы</li>
    </ol>
</div>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Редактирование</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo site_url("billing/firm_edition/{$r->id}"); ?>" method="post"
                      class="form-horizontal">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Номер договора</label>
                        <div class="col-sm-6">
                            <input type="text" name="dogovor" class="form-control" value='<?php echo $r->dogovor; ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Наименование организации</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($r->name); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Адрес</label>
                        <div class="col-sm-6">
                            <input type="text" name="address" class="form-control" value="<?php echo $r->address; ?>">
                        </div>
                    </div>
                    <div class="form-group"><label for="" class="col-sm-6 control-label">Телефон</label>
                        <div class="col-sm-6">
                            <input type="text" name="telefon" class="form-control" value="<?php echo $r->telefon; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">РНН</label>
                        <div class="col-sm-6">
                            <input type="number" name="rnn" class="form-control" value="<?php echo $r->rnn; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Дата договора</label>
                        <div class="col-sm-6">
                            <input type="text" name="dogovor_date" class="form-control" value="<?php echo $r->dogovor_date; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Имя директора</label>
                        <div class="col-sm-6">
                            <input type="text" name="director_name" class="form-control" value="<?php echo $r->director_name; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Адрес директора</label>
                        <div class="col-sm-6">
                            <input type="text" name="director_address" class="form-control" value="<?php echo $r->director_address; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Количество учредителей</label>
                        <div class="col-sm-6">
                            <input type="text" name="person" class="form-control" value="<?php echo $r->person; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Расчетный счет</label>
                        <div class="col-sm-6">
                            <input type="text" name="raschetnyy_schet" class="form-control" value="<?php echo $r->raschetnyy_schet; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">БИН</label>
                        <div class="col-sm-6">
                            <input type="text" name="bin" class="form-control" value="<?php echo $r->bin; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Потери</label>
                        <div class="col-sm-6">
                            <select name="is_pot_id" id="" class="form-control">
                                <?php foreach ($is_pot as $i): ?>
                                    <option <?php echo $i->id == $r->is_pot_id ? 'selected' : ''; ?>
                                            value="<?php echo $i->id; ?>"><?php echo $i->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Дата потерь</label>
                        <div class="col-sm-6">
                            <select name="period_id" id="" class="form-control">
                                <?php foreach ($period as $p): ?>
                                    <option <?php echo $p->id == $r->period_id ? 'selected' : ''; ?>
                                            value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Банк</label>
                        <div class="col-sm-6">
                            <select name="bank_id" id="" class="form-control">
                                <?php foreach ($bank as $b): ?>
                                    <option <?php echo $b->id == $r->bank_id ? 'selected' : ''; ?>
                                            value="<?php echo $b->id; ?>"><?php echo $b->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Отрасль</label>
                        <div class="col-sm-6">
                            <select name="otrasl_id" id="" class="form-control">
                                <?php foreach ($firm_otrasl as $o): ?>
                                    <option <?php echo $o->id == $r->otrasl_id ? 'selected' : ''; ?>
                                            value="<?php echo $o->id; ?>"><?php echo $o->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Группа</label>
                        <div class="col-sm-6">
                            <select name="subgroup_id" id="" class="form-control">
                                <?php foreach ($firm_subgroup as $s): ?>
                                    <option <?php echo $s->id == $r->subgroup_id ? 'selected' : ''; ?>
                                            value="<?php echo $s->id; ?>"><?php echo $s->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Группа по потреблению</label>
                        <div class="col-sm-6">
                            <select name="firm_power_group_id" id="" class="form-control">
                                <?php foreach ($firm_power_group as $pg): ?>
                                    <option <?php echo $pg->id == $r->firm_power_group_id ? 'selected' : ''; ?>
                                            value="<?php echo $pg->id; ?>"><?php echo $pg->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Турэ</label>
                        <div class="col-sm-6">
                            <select name="ture_id" id="" class="form-control">
                                <?php foreach ($ture as $t): ?>
                                    <option <?php echo $t->id == $r->ture_id ? 'selected' : ''; ?>
                                            value="<?php echo $t->id; ?>"><?php echo $t->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Куратор</label>
                        <div class="col-sm-6">
                            <select name="user_id" id="" class="form-control">
                                <?php foreach ($user as $u): ?>
                                    <option <?php echo $u->id == $r->user_id ? 'selected' : ''; ?>
                                            value="<?php echo $u->id; ?>"><?php echo $u->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Ампераж: Фаза A</label>
                        <div class="col-sm-6">
                            <input name="phase_a" type="text" class="form-control" value="<?php echo $r->phase_a; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Ампераж: Фаза B</label>
                        <div class="col-sm-6">
                            <input name="phase_b" type="text" class="form-control" value="<?php echo $r->phase_b; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Ампераж: Фаза C</label>
                        <div class="col-sm-6">
                            <input name="phase_c" type="text" class="form-control" value="<?php echo $r->phase_c; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label"></label>
                        <div class="col-sm-6 col-sm-offset-6">
                            <button class="btn btn-primary btn-block" type="submit">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
