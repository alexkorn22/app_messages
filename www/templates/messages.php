
<form action="/User/AddMessagePost/" method="post" class="form-horizontal" role="form">
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
        <!--БЛОК СООБЩЕНИЯ-->
         <div class="message block_mess">
             <h4><?php echo date('d.m.Y H:m', $item->date);?></h4>
             <h3>Автор: <?php echo $item->author->full_name;?> </h3
             <p><?php echo $item->text?></p>
             <a href="javascript:void(0);" class = "open_comments" onclick="OpenComment(this)">Комментировать <i class = "fa fa-angle-right"></i></a>
             <form action="index.php?ctrl=User&act=AddCommentsPost" method="post" class="form-horizontal hidden form_comment" role="form">
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
        <div class="comments">
            <!--БЛОК КОММЕНТАРИЙ УР1-->
            <?if(!empty($item->comments)):?>
                <?foreach ($item->comments as $comment):?>
                    <div class="row ">
                        <div class="col-md-11 col-md-offset-1">
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
                            <!--БЛОК КОММЕНТАРИЙ УР2-->
                            <!--КОНЕЦ БЛОК КОММЕНТАРИЙ УР2-->
                        </div>
                    </div>

                <?endforeach;?>
            <?endif;?>
            <!--КОНЕЦ БЛОК КОММЕНТАРИЙ УР1-->
        </div>
    </div>
                    <!--БЛОК КОММЕНТАРИЙ УР2-->
                    <!--КОНЕЦ БЛОК КОММЕНТАРИЙ УР2-->
                    <!--БЛОК КОММЕНТАРИЙ УР3-->
                    <!--КОНЕЦ БЛОК КОММЕНТАРИЙ УР3-->

                <!--КОНЕЦ БЛОК СООБЩЕНИЯ-->
</div>
<?endforeach;?>
