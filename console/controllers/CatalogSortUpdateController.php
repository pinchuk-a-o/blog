<?php

namespace console\controllers;

use yii\console\Controller;

class CatalogSortUpdateController extends Controller
{
    public function actionIndex(): void
    {
        $sql = "with sort_upd as (select c.id, count(a.id) as s, ntile(32000) over (order by count(a.id)) as rank
                                  from catalog c
                                           left join public.article a on c.id = a.catalog_id
                                  group by c.id
                                  order by s desc),
                     upd as (update catalog c set sort = su.rank from sort_upd su where c.id = su.id returning c.id, su.rank)
                select * from upd;";

        \Yii::$app->getDb()->createCommand($sql)->execute();
    }
}