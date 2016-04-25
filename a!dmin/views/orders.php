<?php 
//require_once("services/items.php");
?>
<table id="dataTable" class="table  table-bordered table-hover table-responsive">
    <h2>Таблица заказов</h2>
    <thead>
        <tr>
            <?php foreach ($items as $i):
            foreach ($i as $key => $v): ?>
            <th><?=$key?></th>
        <?php endforeach;
        break;?>
        <th></th>
    <?php endforeach ?>
    <th></th>
</tr>
</thead>
<tbody>
    <?php foreach ($items as $i):?>
        <tr>
            <?php foreach ($i as $key => $v):?>
               <?php if($key == 'status'): ?>
                <?php
                if($v == 'new')
                    $status = 'done';
                else
                    $status = 'new';
                ?>
                <td><select class="status">
                   <option id="<?=$i['id']?>"><?=$v?></option>
                   <option id="<?=$i['id']?>"><?=$status?></option>
               </select></td>
           <?php else: ?>      
            <td><?=$v?></td>
        <?php endif ?>
    <?php endforeach ?>
    <td id="buttonTh"><a class="btn btn-danger" href="./services/orders.php?action=delete&id=<?php echo $i['id']?>" >Delete</a>
    </td>
</tr>
<?php endforeach ?>
</tbody>
</table>

