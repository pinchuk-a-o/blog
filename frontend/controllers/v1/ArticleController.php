<?php

namespace frontend\controllers\v1;

use common\models\Article;
use frontend\catalog\Transformer;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class ArticleController extends Controller
{
    private Transformer $catalogTransformer;

    public function __construct($id, $module, $config, Transformer $catalogTransformer)
    {
        parent::__construct($id, $module, $config);

        $this->catalogTransformer = $catalogTransformer;
    }

    public function actionArticle(int $id): Response
    {
        $article = Article::findOne($id);

        $data = $this->transformArticle($article);

        return $this->asJson($data);
    }

    private function transformArticle(Article $article): array
    {
        $response['catalog'] = $this->catalogTransformer->transform($article->catalog);
        $response['article'] = [
            'id' => $article->id,
            'author' => [
                'author_id' => $article->author->id,
                'name' => $article->author->username,
            ],
            'title' => $article->title,
            'url' => $article->getUrl(),
            'text' => \Yii::$app->formatter->asHtml($article->text),
        ];

        return $response;
    }
}
