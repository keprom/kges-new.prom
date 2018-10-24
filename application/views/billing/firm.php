<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('billing/') ?>">Все фирмы</a></li>
        <li class="active"><?php echo $r->dogovor; ?></li>
    </ol>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <?php $name_color = $is_closed->closed == 't' ? 'red' : ''; ?>
                        <h3 class="<?php echo $name_color; ?>"><?php echo $r->dogovor . ". " . $r->name; ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                        $message = '';
                        $message_color = 'alert-warning';
                        if ($r->firm_closed == 't') {
                            $message_color = $r->close_type == 1 ? 'alert-success' : 'alert-warning';
                            $message .= "Абонент закрыт. Занесение данных не должно быть произведено.<br>";
                        }
                        if ($this->session->flashdata("is_deleted") > 0) {
                            $message .= "Точка учета не может быть удалена так, как на ней имеются счетчики. Удалите сначала все счетчики.<br>";
                        }
                        if ($this->session->flashdata("is_deleted") == -1) {
                            $message .= "Точка учета  успешно удалена.<br>";
                        }
                        ?>
                        <?php if (!empty($message)): ?>
                            <div class="alert <?php echo $message_color; ?>" role="alert">
                                <strong><?php echo $message; ?></strong>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-condensed table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Адрес</th>
                                <th>Телефон</th>
                                <th>РНН</th>
                                <th>Дата дог.</th>
                                <th>ТУРЭ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo $r->address; ?></td>
                                <td><?php echo $r->telefon; ?></td>
                                <td><?php echo $r->rnn; ?></td>
                                <td><?php echo $r->dogovor_date; ?></td>
                                <td><?php echo $r->ture_name; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="list-group">
                            <a href="<?php echo site_url("billing/firm_edit/{$r->id}"); ?>"
                               class="list-group-item list-group-item-info"><span
                                        class="glyphicon glyphicon-book"
                                        aria-hidden="true"></span>
                                Данные организации</a>
                            <a href="<?php echo site_url("billing/pre_graph/{$r->id}"); ?>"
                               class="list-group-item list-group-item-info"><span
                                        class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> График
                                потребления</a>
                            <a href="<?php echo site_url("billing/billing_point_info/{$r->id}"); ?>"
                               class="list-group-item list-group-item-info"><span
                                        class="glyphicon glyphicon-book"
                                        aria-hidden="true"></span>
                                Информация по точкам учета</a>
                            <a href="<?php echo site_url("billing/rashod_electro/{$r->id}"); ?>"
                               class="list-group-item list-group-item-info"><span
                                        class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Расход
                                электроэнергии</a>
                            <a href="<?php echo site_url("billing/docs_register/{$r->id}"); ?>"
                               class="list-group-item list-group-item-info"><span
                                        class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Регистрация
                                документов</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="list-group">
                            <a href="<?php echo site_url("billing/firm_oborotka/{$r->id}"); ?>"
                               class="list-group-item list-group-item-success"><span
                                        class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                                Оборотка</a>
                            <a href="<?php echo site_url("billing/firm_oplata/{$r->id}"); ?>"
                               class="list-group-item list-group-item-success"><span
                                        class="glyphicon glyphicon-rub"
                                        aria-hidden="true"></span>
                                Оплата</a>
                            <a href="<?php echo site_url("billing/edit_pokaz/{$r->id}"); ?>"
                               class="list-group-item list-group-item-success"><span
                                        class="glyphicon glyphicon-cog"
                                        aria-hidden="true"></span>
                                Редактирование показаний</a>
                            <a href="<?php echo site_url("billing/pre_schetoplata/{$r->id}"); ?>"
                               class="list-group-item list-group-item-success"><span
                                        class="glyphicon glyphicon-print" aria-hidden="true"></span> Счет на оплату</a>
                            <a href="<?php echo site_url("billing/pre_sf/{$r->id}"); ?>"
                               class="list-group-item list-group-item-success"><span
                                        class="glyphicon glyphicon-print" aria-hidden="true"></span> Счет-фактура</a>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="list-group">
                            <a href="<?php echo site_url("billing/add_akt_with_tariff/{$r->id}"); ?>"
                               class="list-group-item list-group-item-info"><span
                                        class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Добавить
                                тарифицированный
                                акт</a>
                            <a href="<?php echo site_url("billing/close_firm/{$r->id}"); ?>"
                               class="list-group-item list-group-item-info"><span
                                        class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Начислить</a>
                            <a href="<?php echo site_url("billing/open_firm/{$r->id}"); ?>"
                               class="list-group-item list-group-item-info"><span
                                        class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Х</a>

                            <a href="<?php echo site_url("billing/full_close_firm/{$r->id}"); ?>"
                               class="list-group-item list-group-item-danger"><span
                                        class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Закрыть/открыть
                                (временно <input
                                        type=checkbox name=vremenno>)</a>

                            <a href="<?php echo site_url("billing/fine/{$r->id}"); ?>"
                               class="list-group-item list-group-item-warning"><span
                                        class="glyphicon glyphicon-fire"
                                        aria-hidden="true"></span> Пеня</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <form action="<?php echo site_url("billing/vedomost"); ?>" method="get" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <select class="form-control" name='period_id'>
                                        <?php foreach ($period as $p): ?>
                                            <option value="<?php echo $p->id; ?>" <?php $p->checked; ?> ><?php echo $p->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type=hidden name='firm_id' value="<?php echo $r->id; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="submit" class="form-control btn-success" value="Ведомость">
                                    <input type="hidden" name='fast_met' id="fast_met" value="false">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


