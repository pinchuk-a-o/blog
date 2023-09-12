<?php

namespace frontend\controllers\v1;

use common\models\Article;
use common\models\Catalog;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class CatalogController extends Controller
{
    public function actionCatalogs(): Response
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
            $response['catalogs'][] = $this->transformCatalog($catalog);
        }

        return $response;
    }

    private function transformCatalog(Catalog $catalog): array
    {
        return [
            'id' => $catalog->id,
            'title' => $catalog->title,
            'url' => 'catalog/' . $catalog->id,
            'type' => $catalog->type,
        ];
    }

    public function actionArticles(int $id): Response
    {
        $catalog = Catalog::findOne($id);

        if ($catalog->type === Catalog::TYPE_CATEGORY) {
            $page = \Yii::$app->request->get('page', 1) - 1;
            $limit = \Yii::$app->request->get('limit', 10);

            $articles = Article::find()
                ->where(['catalog_id' => $id])
                ->orderBy('created_at ASC')
                ->offset($limit * $page)
                ->limit($limit)
                ->all();
        } else {
            $articles = Article::find()->where(['catalog_id' => $id])->orderBy('sort ASC')->all();
        }

        $data = $this->transformArticles($articles, $catalog);

        return $this->asJson($data);
    }

    private function transformArticles(array $articles, Catalog $catalog): array
    {
        $response = ['articles' => [], 'counter' => 0];

        $response['catalog'] = $this->transformCatalog($catalog);
        /** @var Article $article */
        foreach ($articles as $article) {
            $response['articles'][] = [
                'id' => $article->id,
                'author' => [
                    'author_id' => $article->author->id,
                    'name' => $article->author->username,
                ],
                'title' => $article->title,
                'url' => 'article/' . $article->id,
                'short_text' => \Yii::$app->formatter->asHtml($article->short_text),
            ];
        }

        return $response;
    }
}
