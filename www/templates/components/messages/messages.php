    <? if (!$ajaxMode): ?>
        <?php echo $headerMessages ?>
        <div id="message_container">
    <? endif; ?>
    <? foreach ($arResult as $item): ?>
        <div class="row">
            <div class="col-md-12">
                <!--БЛОК СООБЩЕНИЯ-->
                <?
                $this->item = $item;
                $this->display('messages/message');
                ?>
                <div class="comments">
                    <!--БЛОК КОММЕНТАРИЙ УР1-->
                    <? if (!empty($item->comments)): ?>
                        <? foreach ($item->comments as $comment): ?>
                            <div class="row ">
                                <div class="col-md-11 col-md-offset-1">
                                    <?
                                    $this->comment = $comment;
                                    $this->display('messages/comment');
                                    ?>
                                    <!--БЛОК КОММЕНТАРИЙ УР2-->
                                    <!--КОНЕЦ БЛОК КОММЕНТАРИЙ УР2-->
                                </div>
                            </div>

                        <? endforeach; ?>
                    <? endif; ?>
                    <!--КОНЕЦ БЛОК КОММЕНТАРИЙ УР1-->
                </div>
            </div>
            <!--БЛОК КОММЕНТАРИЙ УР2-->
            <!--КОНЕЦ БЛОК КОММЕНТАРИЙ УР2-->
            <!--БЛОК КОММЕНТАРИЙ УР3-->
            <!--КОНЕЦ БЛОК КОММЕНТАРИЙ УР3-->
            <!--КОНЕЦ БЛОК СООБЩЕНИЯ-->
        </div>
    <? endforeach; ?>
    <? if (!$ajaxMode): ?>
    </div>
        <div class="row">
            <div class="col-md-12 wrap_load">
                <div class="load center_block">
                </div>
            </div>
        </div>
    <? endif; ?>



