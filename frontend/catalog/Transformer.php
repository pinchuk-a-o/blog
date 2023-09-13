<?php

namespace frontend\catalog;

use common\models\Catalog;

class Transformer
{
    public function transform(Catalog $catalog): array
    {
        return [
            'id' => $catalog->id,
            'title' => $catalog->title,
            'url' => $catalog->getUrl(),
            'type' => $catalog->type,
        ];
    }
}