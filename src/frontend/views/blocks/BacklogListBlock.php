<?php

use yii\helpers\Html;

/**
 * View file for block: BacklogListBlock 
 *
 * File has been created with `block/create` command. 
 *
 *
 * @var $this \luya\cms\base\PhpBlockView
 */
?>

<h1><?= Yii::t('trellofrontend', 'trello_block_header') ?></h1>

<?php if ($this->extraValue('boards')): ?>
    <h3><?= Yii::t('trellofrontend', 'boards_list') ?></h3>

    <table class="table">
        <thead>
            <tr>
                <th><?= Yii::t('trellofrontend', 'id') ?></th>
                <th><?= Yii::t('trellofrontend', 'project_name') ?></th>
                <th><?= Yii::t('trellofrontend', 'project_url') ?></th>
                <th><?= Yii::t('trellofrontend', 'project_short_link') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->extraValue('boards') as $item) { ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= Html::a(Yii::t('trellofrontend', 'link'), $item['url']) ?></td>
                    <td><?= $item['shortLink'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php endif; ?>

<?php if ($this->extraValue('firstMember')): ?>
    <h3><?= Yii::t('trellofrontend', 'member_info') ?></h3>

    <table class="table">
        <thead>
        <tr>
            <th><?= Yii::t('trellofrontend', 'full_name') ?></th>
            <th><?= Yii::t('trellofrontend', 'username') ?></th>
            <th><?= Yii::t('trellofrontend', 'avatar') ?></th>
            <th><?= Yii::t('trellofrontend', 'limits') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $item = $this->extraValue('firstMember') ?>
            <tr>
                <td><?= $item['fullName'] ?></td>
                <td><?= $item['username'] ?></td>
                <td><?= Html::img($item['avatarUrl']) ?></td>
                <td><pre><?php print_r($item['limits']) ?></pre></td>
            </tr>
        </tbody>
    </table>
<?php endif; ?>

<style>
    .footer {
        display: none;
    }
</style>
