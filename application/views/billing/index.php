<div class="row">
    <ol class="breadcrumb">
        <li class="active">Все фирмы</li>
    </ol>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-condensed table-hover">
            <caption>Всего <?php echo count($firms); ?> фирм(-а) (<a href="<?php echo site_url('billing/add_firm') ?>">добавить фирму</a>)</caption>
            <thead>
            <tr>
                <th>Договор</th>
                <th>Наименование</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($firms as $f): ?>
            <tr>
                <?php
                if ($f->firm_closed=="t")
                {
                    if ($f->close_type == 1){
                        $link ="gray";}
                    else
                    {
                        $link ="yellow";
                    }
                }
                else
                {
                    if  ($f->is_closed!=NULL)
                    {
                        $link = "red";
                    }
                    else
                    {
                        $link = "green";
                    }
                }
                ?>
                <td><?php echo $f->dogovor; ?></td>
                <td><a class="<?php echo $link; ?>" href="<?php echo site_url('billing/firm/'.$f->firm_id); ?>"><?php echo $f->firm_name; ?></a></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>