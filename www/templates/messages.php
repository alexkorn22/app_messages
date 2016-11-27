<form action="index.php?ctrl=User&act=AddMessagePost" method="post" class="form-horizontal" role="form">
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
                <!--БЛОК СООБЩЕНИЯ-->
                <a class="pull-left" >
                    <p>Автор: <?php echo $item->id_author;?> </p>
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo date('d.m.Y H:m', $item->date);?></h4>
                    <p><?php echo $item->text?></p>
                    <form action="index.php?ctrl=User&act=AddCommentsPost" method="post" class="form-horizontal" role="form">
                        <input type="hidden" name="id_parent" value="<?php echo $item->id?>">
                        <input type="hidden" name="type_parent" value="messages">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control" name="text" rows="3" placeholder="Введите текст комментария"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-lg">Комментировать</button>
                            </div>
                        </div>
                    </form>
                    <!--БЛОК КОММЕНТАРИЙ УР1-->
                </div>
                <!--КОНЕЦ БЛОК СООБЩЕНИЯ-->
            </li>
        </ul>
    </div>
</div>
<?endforeach;?>
