<?php
error_reporting(E_ALL ^ E_NOTICE);

$where = '';
    $limit = 20;
  $sql = "
    SELECT cp.*, z.date_off, z.id AS order_id, z.nomer, z.status, p.title AS paper_title, p.real_type, cm.dateOverShift, mDw.start AS digital_date, m.name AS machine_name, m.place AS machine_place
    FROM calculations_parts AS cp
    LEFT JOIN calculations AS c
    ON c.id = cp.calculation_id
    LEFT JOIN zakaz AS z
    ON z.raschet = c.old_id
    LEFT JOIN paper AS p
    ON p.id = cp.paper_id
    LEFT JOIN machines AS m
    ON m.id = cp.machine_id
    LEFT JOIN cabinets_machines AS cm
    ON cm.calcpart_id = cp.id
    LEFT JOIN machinesDigital_works AS mDw
    ON mDw.calcPartId = cp.id
    WHERE z.status <= 210 AND z.raschet <> 0 AND z.date_off IS NOT NULL AND z.date_off <> '0000-00-00 00:00:00' AND cp.pages_width <> 0 AND (cp.paper_type = '' OR (cp.paper_type = 'custom' AND cp.paper_list_price > 0)) AND cp.pages_height <> 0 AND cp.lists <> 0 {$where} AND z.date_off >= '2016-06-01 00:00:00'
    ORDER BY mDw.start ASC, cm.dateOverShift ASC, DATE_FORMAT(z.date_off,'%Y-%m-%d') ASC, cp.stock_status ASC
    LIMIT ".$limit;
    
  $orders = Yii::app()->db->createCommand($sql)->queryAll();
  
  $sql = "SELECT *, CONCAT_WS('x',width,height) AS id
    FROM paper_sizes";
  $paper_sizes = Yii::app()->db->createCommand($sql)->queryAll();

  $week = array(
    '1' => 'Понеделник',
    '2' => 'Вторник',
    '3' => 'Среда',
    '4' => 'Четверг',
    '5' => 'Пятница',
    '6' => 'Суббота',
    '7' => 'Воскресенье',
  );
  $months = array(
    '01' => 'явнваря',
    '02' => 'февраля',
    '03' => 'марта',
    '04' => 'апреля',
    '05' => 'мая',
    '06' => 'июня',
    '07' => 'июля',
    '08' => 'августа',
    '09' => 'сентября',
    '10' => 'октября',
    '11' => 'ноября',
    '12' => 'декабря',
  );
  $offices = array(
    '1' => 'Партийный',
    '2' => 'Красногорск',
  );
  $types = array(
    'hard'   => 'Твердый',
    'sewing' => 'КШС',
    'glue'   => 'КБС', 
    'staple' => 'Скоба',
    'spring' => 'Пружина',
  );
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
    
  function textstatus($status){
    if($status<100){ 
      if($status==50){$r="Отозван";}
      else{$r="Ожидается";}
    }
    elseif($status<200){ $r="На препрессе";}
    elseif($status<300){
      if($status==201 or $status==200){$r="Поступил";}
      elseif($status==210){$r="Принят";}
      elseif($status==220){$r="Напечатан";}
      elseif($status==230){$r="Постпечать";}
      else{$r="В печати";}
      }
    elseif($status<500){ $r="На складе";}
    elseif($status==999){ $r="У клиента";}
    return $r;
  }

  function project_status_class($status) {
    if ( $status < 100 ) { 
      if ( $status == 50 ) {
        $r = "status-cancelled";
      } else {
        $r = "status-waiting";
      }
    } elseif ( $status < 200 ) {
      $r = "status-prepress";
    } elseif ( $status < 300 ) {
      if ( $status == 201 || $status==200 ) {
        $r = "status-new";
      } elseif ( $status == 210 ) {
        $r = "status-accepted";
      } elseif ( $status == 220 ) {
        $r = "status-done";
      } elseif ( $status == 230 ) {
        $r = "status-postpress";
      } else {
        $r = "status-press";
      }
    } elseif ( $status < 500 ) {
      $r = "status-storage";
    } elseif ( $status == 999 ) {
      $r = "status-client";
    }
    return $r;
  }
  $statuses = array(
    'ordered'  => 'Заказан',
    'in_stock' => 'В наличии',
  );
    $places = array(
      'bv' => 'БВ',
      'kt' => 'КТ',
    );
?>
<table border="1" class="text-nowrap text-center">
    <thead>
        <tr>
            <th>Заказ</th>
            <th>Статус</th>
            <th>Дата печати</th>
            <th>Дата сдачи</th>
            <th>Бумага</th>
            <th>Обрезной формат</th>
            <th>Формат листов</th>
            <th>Формат листов (min)</th>
            <th>Количество листов</th>
            <th>Вес листов</th>
            <th>Вес листов (min)</th>
            <th>Стоимость листов</th>
            <th>Выигрыш в цене</th>
            <th>Заказать</th>
            <!--<th>Статус бумаги</th>-->
            <!--<th>Дата появления</th>-->
            <!--<th>Комментарий</th>-->
            <th>Машины</th>
        </tr>
    </thead>
    <tbody>
<?php
  $parts = array();
  foreach($orders as $order):
    if ( in_array($order['id'],$parts) ) continue;
    $parts[] = $order['id'];
    if ( $order['dateOverShift'] )
      $date = date_create(preg_replace('/^(\d{4})(\d{2})(\d{2})(\d{2})$/','\1-\2-\3',$order['dateOverShift']));
    elseif ( $order['digital_date'] )
      $date = date_create($order['digital_date']);
    else
      $date = false;
      
    $factor = ($order['lists_min_width']*$order['lists_min_height'])/($order['lists_width']*$order['lists_height']);
    if ( !$order['lists_min_weight'] ) $order['lists_min_weight'] = ceil($order['lists_weight']*$factor);
    $order['lists_min_price'] = ceil($order['lists_price']*$factor);
    $companies = array();
   

    $order['total_lists'] = $order['lists']+$order['fittings_lists'];
    $tmp  = $paper_sizes["{$order['lists_width']}x{$order['lists_height']}"];
    $tmp2 = '';
    if ( $tmp && $tmp['stock_width'] && $tmp['stock_height'] && $tmp['stock_factor'] ) {
      $order['lists_width']  = $tmp['stock_width'];
      $order['lists_height'] = $tmp['stock_height'];
      $order['total_lists']  = ceil($order['total_lists']/$tmp['stock_factor']);
      $tmp2 = '*';
    } elseif ( "{$order['lists_width']}x{$order['lists_height']}" == "420x297" ) {
      $tmp2 = '(600 роль)';
    } elseif ( "{$order['lists_width']}x{$order['lists_height']}" == "487x330" ) {
      $tmp2 = '(660 роль)';
    }
    $companies = array_keys($companies);
?>
  <tr id="<?php echo $order['id'] ?>" zakaz_id = "<?php echo $order['order_id'] ?>">
    <td><?php echo $order['nomer'].($date ? ($order['dateOverShift'] ? ' (О)' : ' (Ц)') : '') ?></td>
    <td class="<?php echo project_status_class($order['status']) ?>"><?php echo textstatus($order['status']) ?></td>
    <td><?php echo date_create($order['date_in'])->format('Y-m-d'); ?></td>
    <td><?php echo date_create($order['date_off'])->format('Y-m-d') ?></td>
    <td><?php echo $order['paper_type'] ? 'Дизайнерская' : "{$paper_names[$order['real_type']]} {$order['paper_title']}" ?></td>
    <td><?php echo "{$order['pages_width']}x{$order['pages_height']}" ?></td>
    <td><?php echo "{$order['lists_width']}x{$order['lists_height']}".$tmp2 ?></td>
    <td><?php echo "{$order['lists_min_width']}x{$order['lists_min_height']}" ?></td>
    <td><?php echo $order['total_lists'].$tmp2 ?></cell>
    <td><?php echo $order['lists_weight'] ?></td>
    <td><?php echo $order['lists_min_weight'] ?></td>
    <td><?php echo $order['lists_price'] ?></td>
    <td><?php echo $order['lists_price']-$order['lists_min_price'] ?></td>
    <!--<td><?php //echo ($order['stock_status'] == "ordered") ? "заказан" : ""; ?></td>-->
    <!--<td><?php //echo $order['stock_date'] && $order['stock_date'] != '0000-00-00' ? date_create($order['stock_date'])->format('Y-m-d') : '' ?></td>-->
    <!--<td><?php //echo $order['stock_name'] ?></td>-->
    <!--<td><?php //echo $order['stock_roller_width'] ? $order['stock_roller_width'] : '' ?></td>-->
    <!--<td><?php //echo $order['stock_comment'] ?></td>-->
    <td><?php echo $order['machine_name'] ? "{$order['machine_name']} ({$places[$order['machine_place']]})" : 'Без печати' ?></td>
    <td>
        <a class="btn btn-link" href="<?php echo "#".$order['nomer']; ?>">Заказать</a>
    </td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
