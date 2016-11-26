<form action="index.php?ctrl=Messages&act=AddPost" method="post" class="form-horizontal" role="form">
    <div class="form-group">
        <div class="col-sm-12">
            <textarea class="form-control" name="text" rows="10" placeholder="Введите текст сообщения"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary btn-lg">Сообщить</button>
        </div>
    </div>
</form>
<hr>
<?foreach ($arResult as $item):?>
<div class="row">
    <div class="col-md-12">
        <ul class="media-list">
            <li class="media">
                <a class="pull-left" >
                    <p>Автор: <?php echo $item->id_author;?> </p>
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo date('d.m.Y H:m', $item->date);?></h4>
                    <p><?php echo $item->text?></p>
                </div>
            </li>
        </ul>
    </div>
</div>
<?endforeach;?>
