<div class="comment">
    <h4 ><?php echo date('d.m.Y H:m', $comment->date);?></h4>
    <h3>Автор: <?php echo $comment->id_author;?> </h3
    <p><?php echo $comment->text?></p>
    <a href="javascript:void(0);" class = "open_comments" onclick="OpenComment(this)">Комментировать <i class = "fa fa-angle-right"></i></a>
    <form action="index.php?ctrl=User&act=AddCommentsPost" method="post" class="form-horizontal hidden form_comment" role="form">
        <input type="hidden" name="id_parent" value="<?php echo $comment->id?>">
        <input type="hidden" name="type_parent" value="comments">
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
</div>