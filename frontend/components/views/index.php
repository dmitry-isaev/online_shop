<?php

/* @var $root boolean */
/* @var $categories frontend\models\Category */

use yii\helpers\Url;

?>

<?php if (!empty($categories)): ?>
    <?php if ($root): ?>
        <ul id="categories-menu" class="panel-group category-products">
    <?php else: ?>
        <ul class="panel-body">
    <?php endif; ?>
    <?php foreach ($categories as $category): ?>
        <li>
            <a href="<?php echo Url::to(['category/view', 'id' => $category['id']]); ?>">
                <?php if (!empty($category['categories'])): ?>
                    <span class="pull-right"><i class="fa fa-plus"></i></span>
                <?php endif; ?>
                <?php echo $category['name']; ?>
            </a>
            <?php echo $this->context->renderNodes($category['categories']); ?>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>