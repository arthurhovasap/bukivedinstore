<?php

function textstatus($status) {
    if ($status < 100) {
        if ($status == 50) {
            $r = "Отозван";
        } else {
            $r = "Ожидается";
        }
    } elseif ($status < 200) {
        $r = "На препрессе";
    } elseif ($status < 300) {
        if ($status == 201 or $status == 200) {
            $r = "Поступил";
        } elseif ($status == 210) {
            $r = "Принят";
        } elseif ($status == 220) {
            $r = "Напечатан";
        } elseif ($status == 230) {
            $r = "Постпечать";
        } else {
            $r = "В печати";
        }
    } elseif ($status < 500) {
        $r = "На складе";
    } elseif ($status == 999) {
        $r = "У клиента";
    }

    return $r;
}

function project_status_class($status) {
    if ($status < 100) {
        if ($status == 50) {
            $r = "status-cancelled";
        } else {
            $r = "status-waiting";
        }
    } elseif ($status < 200) {
        $r = "status-prepress";
    } elseif ($status < 300) {
        if ($status == 201 || $status == 200) {
            $r = "status-new";
        } elseif ($status == 210) {
            $r = "status-accepted";
        } elseif ($status == 220) {
            $r = "status-done";
        } elseif ($status == 230) {
            $r = "status-postpress";
        } else {
            $r = "status-press";
        }
    } elseif ($status < 500) {
        $r = "status-storage";
    } elseif ($status == 999) {
        $r = "status-client";
    }
    return $r;
}

$rec_limit = 10;

$paper_names = array(
    "1" => "Офсетная",
    "4" => "Газетная",
    "6" => "Писчая",
    "2" => "Мелованная (матовая)",
    "3" => "Мелованная (глянцевая)",
    "101" => "Лен односторонний",
    "102" => "Лен двусторонний",
    "103" => "Односторонний картон",
    "104" => "Двусторонний картон",
);

$rec_count = Yii::app()->db->createCommand("SELECT 
            COUNT(*)
            FROM calculations_parts AS cp
            LEFT JOIN calculations AS c
            ON c.id = cp.calculation_id
            JOIN zakaz AS z
            ON z.raschet = c.old_id
            LEFT JOIN paper AS p
            ON p.id = cp.paper_id
            WHERE z.status <= 210 AND z.raschet <> 0 AND z.nomer NOT LIKE '%!S%' AND cp.paper_type = '' AND cp.paper_id <> 0")->queryScalar();

if (isset($_GET{'page'})) {
    $page = $_GET{'page'} + 1;
    $offset = $rec_limit * $page;
} else {
    $page = 0;
    $offset = 0;
}

$left_rec = $rec_count - ($page * $rec_limit);
$sql = "SELECT cp.id, z.nomer, z.date_off, z.date_in, cp.lists_min_width, cp.lists_min_height, cp.lists_width, cp.lists_height, cp.lists_min_weight, cp.lists_weight, cp.pages_width, cp.pages_height, cp.lists_price,
            p.title AS paper_title, p.glossy_matt, z.status, cp.stock_roller_width, cp.stock_status, cp.stock_comment, cp.stock_date, c.old_id, z.id AS zakaz_id, p.real_type, cp.paper_id
            FROM calculations_parts AS cp
            LEFT JOIN calculations AS c
            ON c.id = cp.calculation_id
            JOIN zakaz AS z
            ON z.raschet = c.old_id
            LEFT JOIN paper AS p
            ON p.id = cp.paper_id
            WHERE z.status <= 210 AND z.raschet <> 0 AND z.nomer NOT LIKE '%!S%' AND cp.paper_type = '' AND cp.paper_id <> 0
            ORDER BY cp.stock_status ASC, (cp.lists_price*(1-(cp.lists_min_width*cp.lists_min_height)/(cp.lists_width*cp.lists_height))) DESC, z.date_off ASC
            LIMIT $offset, $rec_limit";


$rows = Yii::app()->db->createCommand($sql)->queryAll();
?>
<div class="orders-list-block">

    <table class="table">
        <thead>
            <tr class="warning">
                <th>Заказ</th>
                <th>Статус</th>
                <th>Дата печати</th>
                <th>Дата сдачи</th>
                <th>Бумага</th>
                <th>Обрезной формат</th>
                <th>Формат листов</th>
                <th>Формат листов(min)</th>
                <th>Количество листов</th>
                <th>Вес листов</th>
                <th>Вес листов(min)</th>
                <th>Статус бумаги</th>
                <th>Дата появления</th>
                <th>Марка бумаги</th>
                <th>Заказанный роль</th>
                <th>Заказанные листы</th>
                <th>Коментарий</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $key => $order) {

                if ($order['lists_min_width'] < 50)
                    continue;
                if (!$order['lists_weight'])
                    continue;
                ?>
                <tr class="<?php echo (($key % 2 == 0) ? "info" : "success"); ?>">
                    <td class="text-nowrap"><?php echo $order['nomer']; ?></td>
                    <td class="<?php echo project_status_class($order['status']); ?> text-nowrap"><?php echo textstatus($order['status']); ?></td>
                    <td><?php echo ($order['date_in'] != '0000-00-00 00:00:00') ? app::dateTimeByFormat($order['date_in']) : 'NULL'; ?></td>
                    <td><?php echo ($order['date_off'] != '0000-00-00 00:00:00') ? app::dateTimeByFormat($order['date_off']) : 'NULL'; ?></td>
                    <td><?php echo isset($paper_names[$order['real_type']]) ? $paper_names[$order['real_type']] : $order['paper_id']; ?></td>
                    <td><?php echo $order['pages_width'] . "x" . $order['pages_height']; ?></td>
                    <td><?php echo $order['lists_width'] . "x" . $order['lists_height']; ?></td>
                    <td><?php echo $order['lists_min_width'] . "x" . $order['lists_min_height']; ?></td>
                    <td><?php echo $order['lists_weight']; ?></td>
                    <td><?php echo $order['stock_roller_width'] ? $order['stock_roller_width'] : ''; ?></td>
                    <td><?php echo $order['stock_status']; ?></td>
                    <td><?php echo ($order['stock_date'] && $order['stock_date'] != '0000-00-00') ? app::dateTimeByFormat($order['stock_date']) : 'NULL'; ?></td>
                    <td><?php echo $order['stock_comment']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
if ($page > 0) {
    $last = $page - 2;
    echo "<a href = \"" . app::baseUrl() . "?page = $last\">Last 10 Records</a> |";
    echo "<a href = \"" . app::baseUrl() . "?page = $page\">Next 10 Records</a>";
} else if ($page == 0) {
    echo "<a href = \"" . app::baseUrl() . "?page = $page\">Next 10 Records</a>";
} else if ($left_rec < $rec_limit) {
    $last = $page - 2;
    echo "<a href = \"" . app::baseUrl() . "?page = $last\">Last 10 Records</a>";
}
?>