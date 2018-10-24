<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Точки учета</h3>
            </div>
            <div class="panel-body">
                <?php
                $tp = array();
                foreach ($result->result() as $r) {
                    $tp[$r->tp_id][] = $r;
                }
                ?>
                <?php if ($result->num_rows() > 0) : ?>
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <?php $prev_tp_name = ''; ?>
                            <?php foreach ($result->result() as $r): ?>
                                <?php if ($r->tp_name != $prev_tp_name): ?>
                                    <li role="presentation"><a href="#<?php echo $r->tp_id; ?>"
                                                               aria-controls="<?php echo $r->tp_id; ?>" role="tab"
                                                               data-toggle="tab"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php echo "ТП-" . $r->tp_name; ?></a>
                                    </li>
                                    <?php $prev_tp_name = $r->tp_name; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <?php $prev_tp_name = ''; ?>
                            <?php foreach ($result->result() as $r): ?>
                                <?php if ($r->tp_name != $prev_tp_name): ?>
                                    <div role="tabpanel" class="tab-pane active"
                                         id="<?php echo $r->tp_id; ?>">
                                        <table class="table table-condensed table-bordered table-responsive">
                                            <thead>
                                            <tr>
                                                <th>Наименование</th>
                                                <th class="tp-name">ТП</th>
                                                <th>Адрес</th>
                                                <th class="tp-action">Действия</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <?php foreach ($tp[$r->tp_id] as $counter) : ?>
                                                <tr>
                                                    <td>
                                                        <a href="<?php echo site_url("billing/point/{$counter->id}"); ?>">
                                                        <?php echo $counter->name; ?><br>
                                                        <span class="green"><?php echo $counter->gos_nomer; ?></span><br>
                                                        <span class="blue"><?php echo $counter->counter_type_name; ?></span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php echo $counter->tp_name; ?>

                                                    </td>
                                                    <td>
                                                        <?php echo $counter->address; ?><br>
                                                        <a href="<?php echo site_url("billing/last_edit/{$r->id}"); ?>">
                                                            <?php echo "Гос проверка:" . $counter->last_gos_proverka . "<br>Плановая проверка:" . $counter->last_plan_proverka; ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url("billing/edit_billing_point/$r->id"); ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Редактировать</a><br>
                                                        <?php $color = $r->in_tp=='t'?"green":"red" ?>
                                                        <a class="<?php echo $color; ?>" href="<?php echo site_url("billing/tp_billing_point/$r->id"); ?>"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> В
                                                            ТП</a><br>
                                                        <a href="<?php echo site_url("billing/close_billing_point/$r->id"); ?>"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Снять
                                                            точку учета</a><br>
                                                        <a class="red"
                                                           href="<?php echo site_url("billing/delete_billing_point/{$r->id}"); ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Удалить</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                    <?php $prev_tp_name = $r->tp_name; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert <?php echo $message_color; ?>" role="alert">
                        <strong><?php echo 'Точек учета нет!'; ?></strong>
                    </div>
                <?php endif; ?>
            </div>
        </div>


    </div>
</div>