
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
         <a href="#salesModal" sid="<?php echo $i['id']?>" role="button" class="btn btn-success sales" data-toggle="modal">Sales</a>
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
                <table class="table table-hower table-sales text-center">
                    <thead >
                        <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong>Заполните необходимые поля
                        </div>
                        <th class="text-center">Начальная сумма</th>
                        <th class="text-center">Сидка в %</th>
                        <th></th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>   
                </div>
                <div class="modal-footer">
                    <div class="form-inline">
                        <input id="sale-count" type="number" step="1" class="form-control form-item" placeholder="Количество">
                        <input id="sale-val" type="number" step="0.01" class="form-control form-item" placeholder="Скидка %">
                        <button class="btn add-sale">Добавить скидку</button>
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
                <h3 class="modal-title" id="myModalLabel">Добавить сервер.</h3>
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
                        <label for="cur">Название валюты :</label>
                        <select id="cur"  class="form-control form-item" name="currency">
                            <?php foreach($currency as $cur):?>
                            <option><?=$cur['currency_name']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn" aria-hidden="true" value="Сохранить" >
                </div>
            </form>
        </div>
    </div>
</div> 