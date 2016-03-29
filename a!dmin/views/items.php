<?php 
require_once("services/items.php")
?>
<table id="dataTable" class="table  table-bordered table-hover table-responsive">
        <thead>
        <tr>
            <?php foreach ($items as $i):
                foreach ($i as $key => $v): ?>
                <th><?=$key?></th>;
                <?php endforeach;
                break;?>
                <th></th>
            	<?php endforeach ?>
            	<th><a href="#" class="btn btn-default">Add</a></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $i):?>
            <tr>
            <?php foreach ($i as $key => $v):?>
			<td id="buttonTh"><a class="btn btn-danger" href="../a!dmin/index.php?action=delete&id={$c{'id'}}&game={$GLOBALS['game_name']}\">Delete</a>
            </td>
            <?php endforeach ?>
            <?php endforeach ?>
            </tr>
        </tbody>
</table>