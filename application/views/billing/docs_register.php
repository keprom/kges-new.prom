<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('billing/'); ?>">Все фирмы</a></li>
        <li><a href="<?php echo site_url("billing/firm/{$r->id}"); ?>"><?php echo $r->dogovor; ?></a></li>
        <li class="active">Регистрация документов</li>
    </ol>
</div>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <?php
        $doc[0] = "";
        if (isset($info)) {
            foreach ($info as $inf) {
                $doc[$inf->point_id][$inf->doc_id] = $inf;
            }
        }
        ?>
        <?php foreach ($points as $p): ?>
            <table class="table table-bordered table-condensed">
                <caption><h4><?php echo $p->name; ?></h4></caption>
                <thead>
                <tr>
                    <th>Наименование документа</th>
                    <th>Дата выдачи</th>
                    <th>Наличие</th>
                </tr>
                </thead>
                <tbody>
                <form action="<?php echo site_url("billing/docs_register_form"); ?>">
                    <input type="hidden" name="firm_id" value="<?php echo $r->id; ?>">
                    <input type="hidden" name="point_id" value="<?php echo $p->id; ?>">
                    <?php foreach ($docs as $d): ?>
                        <tr>
                            <td><?php echo $d->name; ?></td>
                            <td>
                                <input type="hidden"
                                       name="<?php echo "doc_" . $d->id; ?>"
                                       value="<?php echo $d->id; ?>">
                                <input type="checkbox"
                                       name="<?php echo "data" . $d->id . "_chek"; ?>"
                                       onclick="<?php echo "this.form.data" . $d->id . "_v.disabled=!this.form.data" . $d->id . "_v.disabled"; ?>"
                                    <?php echo((isset($doc[$p->id][$d->id]->data_reg)) ? "checked" : ""); ?>>
                                <input type="date"
                                       name="<?php echo "data" . $d->id . "_v"; ?>"
                                    <?php echo((isset($doc[$p->id][$d->id]->data_reg)) ? "" : "disabled='true'"); ?>
                                       value="<?php echo((isset($doc[$p->id][$d->id]->data_reg)) ? $doc[$p->id][$d->id]->data_reg : ""); ?>">
                            </td>
                            <td>
                                <input type="checkbox"
                                       name="<?php echo "doc" . $d->id . "_per"; ?>"
                                    <?php echo((isset($doc[$p->id][$d->id]->persist)) ? (($doc[$p->id][$d->id]->persist == "t") ? "checked" : "") : ""); ?>>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3">
                            <input type="submit" value="Сохранить">
                        </td>
                    </tr>
                </form>
                </tbody>
            </table>
        <?php endforeach; ?>
    </div>
</div>