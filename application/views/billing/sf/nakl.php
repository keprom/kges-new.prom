<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Накладная #<?php echo $firm->dogovor; ?></title>
    <link rel="shortcut icon" type="image/png" href="/assets/img/favicon.png">
    <link href="/assets/css/print.css" rel="stylesheet">
    <style>
        body {
            font-size: smaller;
        }
    </style>
</head>
<body class="portrait">

<table class="block border-collapse">
    <tbody>
    <tr>
        <td align="center" width="65%"><h4 class="no-margin"><?php echo $org->org_name; ?></h4></td>
        <td align="right" rowspan="2">
            <i style="font-size: x-small">Приложение 26<br>
                к приказу Министра финансов Республики Казахстан<br>
                от 20 декабря 2012 года № 562 </i>
        </td>
    </tr>
    <tr>
        <td align="center">
            <hr>
            <i>организация (индивидуальный предприниматель)</i></td>
    </tr>
    <tr>
        <td colspan="2" align="right">Форма З-2</td>
    </tr>
    </tbody>
</table>
<br>
<table class="block border-collapse">
    <tbody>
    <tr>
    <tr>
        <td></td>
        <td class="border-td" align="center" style="width: 10%">БИН</td>
        <td class="border-td" align="center" style="width: 15%"><?php echo $org->bin; ?></td>
    </tr>
    </tr>
    </tbody>
</table>
<br>
<table class="block border-table">
    <tr>
        <td style="width: 70%;" rowspan="2"><h3 class="no-margin">Накладная на отпуск запасов на сторону</h3></td>
        <td align="center">Номер документа</td>
        <td align="center">Дата составления</td>
    </tr>
    <tr>
        <td align="center"><?php echo $schetfactura_date->id; ?></td>
        <td align="center"><?php echo strlen($data_schet) == 0 ? date("d-m-Y", strtotime($schetfactura_date->date)) : $data_schet; ?></td>
    </tr>
</table>
<br>
<table class="block border-table">
    <thead>
    <tr>
        <th>Организация (индивидуальный предприниматель) - отправитель</th>
        <th>Организация (индивидуальный предприниматель) - получатель</th>
        <th>Ответственный за поставку (Ф.И.О.)</th>
        <th>Транспортная организация</th>
        <th>Товарно - транспортная накладная (номер, дата)</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $org->org_name; ?></td>
        <td><?php echo $firm->name; ?></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </tbody>
</table>
<br>
<table class="block border-table">
    <thead>
    <tr>
        <th rowspan=2 align=center>№ п./п.</th>
        <th rowspan=2 align=center>Наименование, характеристика</th>
        <th rowspan=2 align=center>Номенклатурный номер</th>
        <th rowspan=2 align=center>Единица измерения</th>
        <th colspan=2 align=center>Количество</th>
        <th rowspan=2 align=center>Цена, в тенге</th>
        <th rowspan=2 align=center>Сумма с НДС,<br> в тенге</th>
        <th rowspan=2 align=center>Сумма НДС,<br> в тенге</th>
    </tr>
    <tr>
        <th align=center>Подлежит отпуску</th>
        <th align=center>Отпущено</th>
    </tr>
    <tr>
        <th align=center>1</th>
        <th align=center>2</th>
        <th align=center>3</th>
        <th align=center>4</th>
        <th align=center>5</th>
        <th align=center>6</th>
        <th align=center>7</th>
        <th align=center>8</th>
        <th align=center>9</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    $itog_nds = $itog_with_nds = $itog_kvt = 0;
    ?>
    <?php foreach ($s as $ss): ?>
    <tr>
        <td align="center"><?php echo $i++; ?></td>
        <td align="center">Электроэнергия</td>
        <td></td>
        <td align="center">кВт*ч</td>
        <td align="center"><?php echo prettify_number($ss->kvt,0); ?></td>
        <td align="center"><?php echo prettify_number($ss->kvt,0); ?></td>
        <td align="center"><?php echo prettify_number($ss->tariff_value,2); ?></td>
        <td align="center"><?php echo prettify_number($ss->with_nds,2); ?></td>
        <td align="center"><?php echo prettify_number($ss->nds_value,2); ?></td>
        <?php
        $itog_kvt += $ss->kvt;
        $itog_nds += $ss->nds_value;
        $itog_with_nds += $ss->with_nds;
        ?>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="6"></td>
        <td class="nowrap" align="center"><b>Итого</b></td>
        <td class="nowrap" align="center"><b><?php echo prettify_number($itog_with_nds); ?></b></td>
        <td class="nowrap" align="center"><b><?php echo prettify_number($itog_nds); ?></b></td>
    </tr>
    </tbody>
</table>
<br>
<table>
    <tbody>
    <tr>
        <td>Всего отпущено запасов (количество прописью): <?php echo $this->chislo->kvt2str($itog_kvt);?></td>
    </tr>
    <tr>
        <td>Всего отпущено на сумму (прописью), в KZT: <?php echo $this->chislo->num2str($itog->itogo_with_nds);?></td>
    </tr>
    </tbody>
</table>
<br>

<table class="block">
    <tbody>
    <tr>
        <td>Отпуск разрешил</td>
        <td align="center">Директор <?php echo $org->director; ?> ______________</td>
        <td width="20%"></td>
        <td>По доверенности №</td>
        <td><?php echo $edit3; ?></td>
    </tr>
    <tr>
        <td></td>
        <td align="center"><i>(должность)(Ф.И.О.)(подпись)</i></td>
        <td></td>
        <td>выданной</td>
        <td align="center">____________________</td>
    </tr>
    <tr>
        <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
        <td>Главный бухгалтер</td>
        <td align="center"><?php echo $org->glav_buh; ?> ______________</td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td></td>
        <td align="center"><i>(Ф.И.О.)(подпись)</i></td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td align="center">М.П.</td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td>Отпустил</td>
        <td align="center">____________________</td>
        <td></td>
        <td>Запасы получил</td>
        <td align="center">____________________</td>
    </tr>
    <tr>
        <td></td>
        <td align="center"><sup><i>(Ф.И.О.)(подпись)</i></sup></td>
        <td></td>
        <td align="center"></td>
        <td align="center"><sup><i>(Ф.И.О.)(подпись)</i></sup></td>
    </tr>
    </tbody>
</table>
<script>
    // window.print();
</script>
</body>
</html>