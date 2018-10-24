<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>СФ #<?php echo $firm->dogovor; ?></title>
    <link rel="shortcut icon" type="image/png" href="/assets/img/favicon.png">
    <link href="/assets/css/print.css" rel="stylesheet">
    <style>
        body {
            font-size: x-small;
        }
    </style>
</head>
<body class="portrait">

<table class="block border-collapse">
    <tbody>
    <tr>
        <td colspan="10" align="center">
            <h2 class="no-margin"><b>Есеп шот-фактура / Счет-фактура
                    №<?php echo strlen($schet2) == 0 ? $schetfactura_date->id : $schet2; ?>
                    от <?php echo date("d.m.Y", strtotime(strlen($data_schet) == 0 ? $schetfactura_date->date : $data_schet)); ?>
                </b></h2>
        </td>
        <td align="right"> (1)</td>
    </tr>
    <tr class="border-bottom">
        <td colspan="10">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr class="border-bottom">
        <td colspan="10"><b>Жеткiзyші <br/>Поставщик:</b> <?php echo $org->org_name; ?>
        </td>
        <td align="right"> (2)</td>
    </tr>
    <tr class="border-bottom">
        <td colspan="10">
            Жеткізушінің БСН мен мекенжайы<br/>БИН и адрес поставщика:
            <?php echo "БИН " . $org->bin . ", " . $org->address; ?> Свидетельство о постановке на
            регистрационный учет по НДС серия 03001 № 0007114 от 17.09.2012
        </td>
        <td align="right">(2а)</td>
    </tr>
    <tr class="border-bottom">
        <td colspan="10">Жеткізушінің ЖСК<br/>ИИК поставщика: <?php echo $org->IIK; ?>
            КБЕ-<?php echo $org->Bank_kbe; ?> КНП-<?php echo $org->bank_knp; ?> <?php echo $org->bank_name; ?>
            БИК <?php echo $org->bank_bik; ?></td>
        <td align="right"> (2б)</td>
    </tr>
    <tr class="border-bottom">
        <td colspan="10">Тауарлар (жұмыстар, қызметтер) жеткізуге арналған шарт (келісім-шарт)<br/>Договор(контракт)
            на поставку товаров (работ, услуг) №: <?php if (strlen($dog2) == '') {
                echo $firm->dogovor . "    от     " . date("d.m.Y", strtotime($firm->dogovor_date));
            } else echo $dog2; ?></td>
        <td align="right"> (3)</td>
    </tr>
    <tr class="border-bottom">
        <td colspan="10">Шарт (келісім-шарт) бойынша төлем шарттары<br/>Условия оплаты по договору
            (контракту): <?php echo $edit1; ?>
        </td>
        <td align="right"> (4)</td>
    </tr>
    <tr class="border-bottom">
        <td colspan="10">Жеткізілетін тауарларды (жұмыстар,құзметтерді) белгіленген пункті<br/>Пункт назначения
            поставляемых товаров (работ,
            услуг): <?php echo $edit2; ?>
        </td>
        <td></td>
    </tr>
    <tr align="center">
        <td colspan="10"><i>(мемлекет,өңір,облыс,қала,аудан/государство, регион, область, город,
                район)</i></td>
        <td></td>
    </tr>
    <tr class="border-bottom">
        <td colspan="10">Тауарды жеткізу (қызметтерді, жұмыстарды) келесі сенімхат бойынша жүзеге асырылды<br/>
            Поставка товаров (работ,услуг) осуществлена по доверенности №: <?php echo $edit3; ?> </td>
        <td align="right">(5)</td>
    </tr>

    <tr class="border-bottom">
        <td colspan="10">Жіберу тәсілі<br/>Способ отправления: <?php echo $edit4; ?>
        </td>
        <td align="right">(6)</td>
    </tr>
    <tr class="border-bottom">
        <td colspan="10">Тауар-көлік жөнелтпе құжатты <br/>Товарно-транспортная накладная</td>
        <td align="right"> (7)</td>
    </tr>
    <tr class="border-bottom">
        <td colspan="10">Жүк жіберуші<br/> Грузоотправитель: филиал ТОО "Кокшетау Энерго Центр" Горэлектросети БИК
            NURSKZKX КБЕ 17 БИН 091241017203 АО "Нурбанк"
        </td>
        <td align="right"> (8)</td>
    </tr>
    <tr align="center">
        <td colspan="10"><i>(БСН, атауы және мекенжайы/БИН, наименование и адрес)</i></td>
        <td></td>
    </tr>
    <tr class="border-bottom">
        <td colspan="10"><b>Жүк алушы БСН<br/>Грузополучатель:</b>
            БИН <?php echo strlen($edit6) == 0 ? $firm->bin . ", " . $firm->name . ", " . $firm->address : $edit6; ?>
        </td>
        <td align="right"> (9)</td>
    </tr>
    <tr align=right>
        <td colspan="10" align="center"><i>(СТН,атауы және мекенжайы/РНН, наименование и адрес)</i></td>
        <td></td>
    </tr>

    <tr class="border-bottom">
        <td colspan="10"><b>Сатып алушы<br/>Покупатель</b> <?php if (strlen($edit7) == 0) {
                echo "{$firm->name}";
            } else {
                echo $edit7;
            } ?>               </td>
        <td align="right"> (10)</td>
    </tr>
    <tr class="border-bottom">
        <td colspan="10">Сатып алушының БСН<br/>БИН и адрес нахождения покупателя:
            <?php echo strlen($edit8) == 0 ? "БИН " . $firm->bin . ", " . $firm->address : $edit8; ?>
        </td>
        <td></td>
    </tr>
    <tr class="border-bottom">
        <td colspan="10">Алушының ЖСК<br/> ИИК получателя: <?php echo $firm->raschetnyy_schet; ?> в банке
            <?php echo $bank->name; ?> БИК<?php echo $bank->mfo; ?></td>
        <td align="right"> (10б)</td>
    </tr>
    </tbody>
</table>

<br>

<table class="border-table block">
    <thead>
    <tr>
        <th rowspan="2">№<br/>Р/с</th>
        <th rowspan="2">Тауарлар (жұмыстар,<br/>қызметтер)<br/>атауы/Наименование<br/> товаров(работ,
            услуг)
        </th>
        <th rowspan="2">Өлшем<br/>бірлігі/<br/>Ед.<br/>изм.</th>
        <th rowspan="2">Саны/Кол-<br/>во(обьем)</th>
        <th rowspan="2">Бағасы/Цена<br/>тенге</th>
        <th rowspan="2">ҚҚС-сыз <br/>құны/Стоимость<br/> без НДС</th>
        <th colspan="2">ҚҚС/НДС</th>
        <th rowspan="2">Cатудың<br/>барлық құны<br/>құны/Всего<br/>стоимость<br/>реализации</th>
        <th colspan="2">Акциз</th>
    </tr>
    <tr>
        <th>Cтавкасы<br/>Ставка</th>
        <th>Сомасы<br/>Сумма</th>
        <th>Cтавкасы<br/>Ставка</th>
        <th>Сомасы<br/>Сумма</th>
    </tr>
    </thead>
    <tbody>
    <tr align="center">
        <td width="60px">1</td>
        <td width="400px">2</td>
        <td width="100px">3</td>
        <td width="150px">4</td>
        <td width="200px">5</td>
        <td width="320px">6</td>
        <td width="110px">7</td>
        <td width="200px">8</td>
        <td width="480px">9</td>
        <td width="110px">10</td>
        <td width="100px">11</td>
    </tr>
    <?php
    $i = 1;
    $itog_tenge = $itog_nds = 0;
    ?>
    <?php foreach ($s as $ss): ?>
        <tr>
            <td align="center"><?php echo $i++; ?></td>
            <td align="center">Электроэнергия за
                <br/> <?php echo get_month_title($schetfactura_date->date) . ' ' . get_year_number($schetfactura_date->date); ?>
                года
            </td>
            <td align="center">КВТ.Ч</td>
            <td align="center"><?php echo prettify_number($ss->kvt, 0); ?></td>
            <td class="td-number"><?php echo prettify_number($ss->tariff_value); ?></td>
            <td class="td-number"><?php echo prettify_number($ss->tenge); ?></td>
            <td align="center"><?php echo prettify_number($period->nds); ?>%</td>
            <td class="td-number"><?php echo prettify_number($period->nds * $ss->tenge / 100); ?></td>
            <td class="td-number"><?php echo prettify_number(($period->nds / 100 + 1) * $ss->tenge); ?></td>
            <td></td>
            <td></td>
            <?php
            $itog_tenge += $ss->tenge;
            $itog_nds += $period->nds * $ss->tenge / 100;
            ?>
        </tr>
    <?php endforeach; ?>

    <?php if ($fine_value > 0): ?>
        <tr>
            <td align="center"><?php echo $i++; ?></td>
            <td align="center">Пеня</td>
            <td align="center">тенге</td>
            <td align="center">1</td>
            <td align="right"><?php echo prettify_number($fine_value); ?></td>
            <td align="right"><?php echo prettify_number($fine_value); ?></td>
            <td align="center">Без НДС</td>
            <td></td>
            <td align="right"><?php echo prettify_number($fine_value); ?></td>
            <td align="center"></td>
            <td align="center"></td>
        </tr>
    <?php endif; ?>

    <tr>
        <td colspan="5"><b>Всего по счету</b></td>
        <td class="td-number"><?php echo prettify_number($itog_tenge + $fine_value); ?></td>
        <td class="gray-cube"></td>
        <td class="td-number"><?php echo prettify_number($itog_nds); ?></td>
        <td class="td-number"><?php echo prettify_number($itog_nds + $itog_tenge + $fine_value); ?></td>
        <td class="gray-cube"></td>
        <td></td>
    </tr>
    </tbody>
</table>

<br><br>

<table>
    <tbody>
    <?php if ($do_fine): ?>
        <tr>
            <td colspan="11"><b>Сальдо пени на начало месяца <?php echo $fine_saldo; ?>; начислено пени <?php echo $fine_value; ?>
                    ;оплачено пени <?php echo $fine_oplata; ?>; сальдо пени на конец
                    месяца <?php echo $fine_saldo + $fine_value - $fine_oplata; ?>.</b>
            </td>
        </tr>
        <tr colspan="11">
            <td colspan="11"><b>Сальдо на начало месяца <?php echo sprintf("%22.2f", $saldo); ?>; сальдо на конец
                    месяца <?php echo sprintf("%22.2f", $saldo - $oplata + $itog->itogo_with_nds); ?>.</b>
            </td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<br>

<table class="block">
    <tbody>
    <tr>
        <td colspan="5" width="40%"><b><?php echo $signer->pos_d; ?>:</b> <?php echo $signer->name; ?></td>
        <td></td>
        <td colspan="5" width="40%"><b>ВЫДАЛ (ответственное лицо поставщика)</b></td>
    </tr>
    <tr>
        <td colspan="5" class="border-bottom-cell">&nbsp;</td>
        <td></td>
        <td colspan="5" class="border-bottom-cell">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="5" align="center"><sup>Ф.И.О., подпись</sup></td>
        <td align="center"><b>М.П.</b></td>
        <td colspan="5" align="center"><sup>Ф.И.О., подпись</sup></td>
    </tr>
    <tr>
        <td colspan="5" ><b><?php echo $signer->pos_g; ?>:</b> <?php echo $signer->glav_buh; ?></td>
        <td></td>
        <td colspan="5" ></td>
    </tr>
    <tr>
        <td colspan="5" class="border-bottom-cell">&nbsp;</td>
        <td></td>
        <td colspan="5" class="border-bottom-cell">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="5" align="center"><sup>Ф.И.О., подпись</sup></td>
        <td></td>
        <td colspan="5" align="center"><sup>получил</sup></td>
    </tr>
    <tr>
        <td colspan="5">&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="11">Примечание: Без печати не действительно. Оригинал (первый экземпляр) - покупателю. Копия (второй
            экземпляр) - поставщику.
        </td>
    </tr>
    </tbody>
</table>
<script>
    window.print();
</script>
</body>
</html>