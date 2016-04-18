
<table id="dataTable" class="table  table-bordered table-hover table-responsive">
    <h2>Таблица серверов <?php echo $game?></h2>
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
         <td id="buttonTh" style="width: 16%;"><a class="btn btn-danger" href="/services/gold.php/?action=delete&game=<?php echo $game?>&id=<?php echo $i['id']?>" >Delete</a>
         <a href="#salesModal" role="button" class="btn btn-success" data-toggle="modal">Sales</a>
         </td>
     </tr>
 <?php endforeach ?>
</tbody>
</table>
<div id="salesModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Добавить сервер</h3>
            </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <div class="form-inline">
                        <input id="priceItem" type="number" step="0.01" class="form-control form-item" placeholder="Количество">
                        <input id="priceItem" type="number" step="0.01" class="form-control form-item" placeholder="Скидка %">
                        <button class="btn">Добавить скидку</button>
                    </div>    
                </div>
          </div>
    </div>
</div>


<div id="itemsModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Скидки для сервера.</h3>
            </div>
            <form method="post" action="/services/gold.php/?action=add&game=<?php echo $game?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputName">Название сервера :</label>
                        <input type="text" class="form-control form-item" name="server"
                        required>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Количество валюты :</label>
                        <input type="number" step="1" class="form-control form-item" name="count">
                    </div>
                    <div class="form-group">
                        <label for="priceItem">Цена (rub) за указынное количество :</label>
                        <input id="priceItem" type="number" step="0.01" class="form-control form-item" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="priceItem">Название валюты (gold, col, adena или любое другое) :</label>
                        <input id="priceItem" type="text" class="form-control form-item" name="currency" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn" aria-hidden="true" value="Сохранить" >
                </div>
            </form>
        </div>
    </div>
</div> 