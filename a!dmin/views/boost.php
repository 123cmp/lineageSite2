<form method="post" action="/services/boost.php/?action=text&game=<?php echo $game?>"> 
	<textarea name="text" style="width: 100%; min-height: 450pt" ><?php echo !empty($text) ? $text : 'Введите текст страницы'?></textarea><br>
	<input type="submit" class="btn btn-info" value="Сохранить"> 
</form>