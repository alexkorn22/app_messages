<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Добавление нового сообщения</div>
            <div class="panel-body">
                <form action="/User/AddMessagePost/" method="post" class="form-horizontal" role="form" onsubmit="return empty_form(this)">
                    <div class="form-group enter_text_group">
                        <div class="col-md-12">
                            <textarea class="form-control enter_text" name="text" rows="5" placeholder="Введите текст сообщения"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-primary btn-lg">Сообщить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<hr>