<?php
/**
 * Created by PhpStorm.
 * User: dan.judex
 * Date: 30.09.2015
 * Time: 11:05
 */

namespace app\widgets\TreeView;


use Yii;

class TreeView extends \kartik\tree\TreeView
{
    public $showIDAttribute = false;
    public $fontAwesome = true;
    public $softDelete = false;
    public $rootOptions = ['label' => '/'];
    public $childNodeIconOptions = ['class' => 'text-warning'];
    public $defaultChildNodeIcon = '<i class="fa fa-folder"></i>';

    public function init()
    {
        parent::init();
        $this->nodeView = '@app/widgets/TreeView/_form';
    }
}
