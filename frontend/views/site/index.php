<?php

/** @var yii\web\View $this */

$this->title = 'API документация';
?>
<div class="site-index">
    <div class="body-content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                        Получить каталоги
                    </button>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Тип:</div>
                            <div class="col-sm-3 fst-italic">GET</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Адрес:</div>
                            <div class="col-sm-3 fst-italic">/v1/catalogs</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Тело запроса:</div>
                            <div class="col-sm-3 fst-italic">-</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Авторизация:</div>
                            <div class="col-sm-3 fst-italic">-</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Ответ 200:</div>
                            <div class="col-sm-3 fst-italic">
                                <code>
                                    { "catalogs": [
                                    {"id": 1, "title":"Название", "url":"/catalog/1", "type":1}, ...
                                    ]
                                    }
                                </code>

                                type:
                                1 - категория
                                2 - курс
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        Получить короткие статьи каталога
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Тип:</div>
                            <div class="col-sm-3 fst-italic">GET</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Адрес:</div>
                            <div class="col-sm-3 fst-italic">/v1/catalogs</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Тело запроса:</div>
                            <div class="col-sm-3 fst-italic">-</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Авторизация:</div>
                            <div class="col-sm-3 fst-italic">-</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Ответ 200:</div>
                            <div class="col-sm-3 fst-italic">
                                <code>
                                    {
                                    "catalogs": [
                                    {"id": 1, "title":"Название", "url":"/catalog/1"}, ...}}
                                    ]
                                    }
                                </code>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        Получить полную статью
                    </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Тип:</div>
                            <div class="col-sm-3 fst-italic">GET</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Адрес:</div>
                            <div class="col-sm-3 fst-italic">/v1/catalogs</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Тело запроса:</div>
                            <div class="col-sm-3 fst-italic">-</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Авторизация:</div>
                            <div class="col-sm-3 fst-italic">-</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 fw-bold">Ответ 200:</div>
                            <div class="col-sm-3 fst-italic">
                                <code>
                                    {
                                    "catalogs": [
                                    {"id": 1, "title":"Название", "url":"/catalog/1"}, ...}}
                                    ]
                                    }
                                </code>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
