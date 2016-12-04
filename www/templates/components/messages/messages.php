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
                                    $this->level = 1;
                                    $this->display('messages/comment');
                                    ?>
                                    <div class="comments">
                                    <!--БЛОК КОММЕНТАРИЙ УР2-->
                                    <? if (!empty($comment->comments)): ?>
                                        <? foreach ($comment->comments as $commentLvl2): ?>
                                        <div class="row ">
                                            <div class="col-md-11 col-md-offset-1">
                                            <?php
                                            $this->comment = $commentLvl2;
                                            $this->level = 2;
                                            $this->display('messages/comment');
                                            ?>
                                                <div class="comments">
                                                    <!--БЛОК КОММЕНТАРИЙ УР3-->
                                                    <? if (!empty($commentLvl2->comments)): ?>
                                                        <? foreach ($commentLvl2->comments as $commentLvl3): ?>
                                                        <div class="row ">
                                                            <div class="col-md-11 col-md-offset-1">
                                                                <?php
                                                                $this->comment = $commentLvl3;
                                                                $this->level = 3;
                                                                $this->display('messages/comment');
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <? endforeach; ?>
                                                    <? endif; ?>
                                                    <!--КОНЕЦ БЛОК КОММЕНТАРИЙ УР3-->
                                                </div>
                                            </div>
                                        </div>
                                        <? endforeach; ?>
                                    <? endif; ?>
                                    <!--КОНЕЦ БЛОК КОММЕНТАРИЙ УР2-->
                                    </div>
                                </div>
                            </div>

                        <? endforeach; ?>
                    <? endif; ?>
                    <!--КОНЕЦ БЛОК КОММЕНТАРИЙ УР1-->
                </div>
            </div>
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



