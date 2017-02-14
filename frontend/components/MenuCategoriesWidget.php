<?php

namespace frontend\components;

use Yii;
use yii\base\Widget;
use frontend\models\Category;

class MenuCategoriesWidget extends Widget
{
    public $categories;

    public $categoriesTree = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $menu = Yii::$app->cache->get('MenuCategoriesWidget');

        if ($menu) return $menu;

        $this->categories = Category::find()->indexBy('id')->asArray()->all();

        $this->categoriesTree = $this->getTree();

        $menu = $this->render('index', [
            'root' => true,
            'categories' => $this->categoriesTree,
        ]);

        Yii::$app->cache->set('MenuCategoriesWidget', $menu, 86400);

        return $menu;
    }

    public function renderNodes($categories)
    {
        return $this->render('index', [
            'categories' => $categories,
        ]);
    }

    private function getTree()
    {
        foreach ($this->categories as $id => &$category) {
            if (!$category['parent_id']) {
                $this->categoriesTree[$id] = &$category;
            } else {
                $this->categoriesTree[$category['parent_id']]['categories'][$category['id']] = &$category;
            }
        }
        return $this->categoriesTree;
    }
}