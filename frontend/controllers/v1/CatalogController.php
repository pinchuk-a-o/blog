<?php

namespace frontend\controllers\v1;

use common\models\Article;
use common\models\Catalog;
use frontend\catalog\Transformer;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class CatalogController extends Controller
{
    private Transformer $catalogTransformer;

    public function __construct($id, $module, $config, Transformer $catalogTransformer)
    {
        parent::__construct($id, $module, $config);

        $this->catalogTransformer = $catalogTransformer;
    }

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
            $response['catalogs'][] = $this->catalogTransformer->transform($catalog);
        }

        return $response;
    }

    public function actionArticles(int $id): Response
    {
        $catalog = Catalog::findOne($id);

        if ($catalog->type === Catalog::TYPE_CATEGORY) {
            $page = Yii::$app->request->get('page', 1) - 1;
            $limit = Yii::$app->request->get('limit', 10);

            $articles = Article::find()
                ->where(['catalog_id' => $id])
                ->andWhere(['is_published' => true])
                ->orderBy('created_at ASC')
                ->offset($limit * $page)
                ->limit($limit)
                ->all();
        } else {
            $articles = Article::find()
                ->where(['catalog_id' => $id])
                ->andWhere(['is_published' => true])
                ->orderBy('sort ASC')
                ->all();
        }

        $data = $this->transformArticles($articles, $catalog);

        return $this->asJson($data);
    }

    private function transformArticles(array $articles, Catalog $catalog): array
    {
        $response = ['articles' => [], 'counter' => 0];

        $response['catalog'] = $this->catalogTransformer->transform($catalog);

        /** @var Article $article */
        foreach ($articles as $article) {
            $response['articles'][] = [
                'id' => $article->id,
                'author' => [
                    'author_id' => $article->author->id,
                    'name' => $article->author->username,
                ],
                'title' => $article->title,
                'url' => $article->getUrl(),
                'short_text' => Yii::$app->formatter->asHtml($article->short_text),
            ];
        }

        return $response;
    }
}
