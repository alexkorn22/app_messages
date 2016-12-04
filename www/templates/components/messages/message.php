<div class="message block_mess panel-heading">
    <div class="row content_message ">
            <div class="col-md-2 left_block">
                <div class="author">
                    <?php echo $item->author->full_name;?>
                </div>
                <div class="date">
                    <?php echo date('d.m.Y H:m', $item->date);?>
                </div>
            </div>
            <div class="col-md-10 right_block">
                <div class="content_block">
                    <p><?php echo $item->text?></p>
                </div>
            </div>
        </div>
    <?if($this->IsAuthUser):?>
            <div class="enter_comment">
                <a href="javascript:void(0);" class = "open_comments" onclick="OpenComment(this)">Комментировать <i class = "fa fa-angle-right"></i></a>
                <form action="/User/AddCommentsPost/" method="post" class="form-horizontal hidden form_comment" role="form" onsubmit="return empty_form(this)">
                    <input type="hidden" name="id_parent" value="<?php echo $item->id?>">
                    <input type="hidden" name="type_parent" value="messages">
                    <div class="form-group enter_text_group enter_text_group">
                        <div class="col-md-12">
                            <textarea class="form-control enter_text" name="text" rows="2" placeholder="Введите текст комментария"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-info btn-xs">Комментировать</button>
                        </div>
                    </div>
                </form>
            </div>
        <?endif;?>
</div>