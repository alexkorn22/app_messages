<div class="message block_mess">
    <h4><?php echo date('d.m.Y H:m', $item->date);?></h4>
    <h3>Автор: <?php echo $item->author->full_name;?> </h3
    <p><?php echo $item->text?></p>
    <a href="javascript:void(0);" class = "open_comments" onclick="OpenComment(this)">Комментировать <i class = "fa fa-angle-right"></i></a>
    <form action="/user/AddCommentsPost/" method="post" class="form-horizontal hidden form_comment" role="form">
        <input type="hidden" name="id_parent" value="<?php echo $item->id?>">
        <input type="hidden" name="type_parent" value="messages">
        <div class="form-group">
            <div class="col-sm-12">
                <textarea class="form-control" name="text" rows="3" placeholder="Введите текст комментария"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-info btn-xs">Комментировать</button>
            </div>
        </div>
    </form>
    <hr>
</div>