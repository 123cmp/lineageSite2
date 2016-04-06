<?php 
require_once("services/items.php");

?>
<table id="dataTable" class="table  table-bordered table-hover table-responsive">
        <h2>Таблица предметов <?=$game?></h2>
        <thead>
        <tr>
            <?php foreach ($items as $i):
                foreach ($i as $key => $v): ?>
                <th><?=$key?></th>
                <?php endforeach;
                break;?>
                <th></th>
            	<?php endforeach ?>
            	<th><a href="#itemsModal" role="button" id="addbtn" class="btn btn-default" data-toggle="modal">Add</a></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $i):?>
            <tr>
            <?php foreach ($i as $key => $v):?>
			<td><?=$v?></td>
            <?php endforeach ?>
           <td id="buttonTh"><a class="btn btn-danger" href="../services/items.php/?action=delete&game=<?php echo $game?>&id=<?php echo $i['id']?>" >Delete</a>
            </td>
            </tr>
             <?php endforeach ?>
        </tbody>
</table>
<div id="itemsModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Добавить предмет</h3>
            </div>
            <form method="post" action="../services/items.php/?action=add&game=<?php echo $game?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="inputName">Название предмета</label>
                    <input type="text" class="form-control form-item" name="name"
                           required>
                </div>
                <div class="form-group coef">
                    <label for="priceItem">Цена (rub)</label>
                    <input id="priceItem" type="number" step="0.01" class="form-control form-item" name="price" required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn" aria-hidden="true" value="Сохранить" >
            </div>
            </form>
        </div>
    </div>
</div>
