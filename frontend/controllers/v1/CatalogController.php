<?php

namespace frontend\controllers\v1;

use common\models\Catalog;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class CatalogController extends Controller
{
    public function actionIndex(): Response
    {
        $catalogs = Catalog::find()->orderBy('sort ASC')->all();

        $data = $this->transformCatalogs($catalogs);

        return $this->asJson($data);
    }

    private function transformCatalogs(array $catalogs): array
    {
        $response = ['catalogs' => []];

        /** @var Catalog $catalog */
        foreach ($catalogs as $catalog) {
            $response['catalogs'][] = [
                'id' => $catalog->id,
                'title' => $catalog->title,
                'url' => 'catalog/' . $catalog->id,
                'type' => $catalog->type,
            ];
        }

        return $response;
    }
}
