<?php

namespace app\modules\admin\models;


use app\behaviors\AliasBehavior;
use app\models\BaseRoute;
use /** @noinspection PhpMethodOrClassCallIsNotCaseSensitiveInspection */
    Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Json;

class Route extends BaseRoute
{

    public function behaviors()
    {
        /** @noinspection SpellCheckingInspection */
        return [
            [
                'class' => AliasBehavior::className(),
                'in_attribute' => 'title',
                'out_attribute' => 'alias',
                'translit' => true
            ],
            TimestampBehavior::className(),
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'route_id' => 'Route ID',
            'text' => 'Text',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_sidebar' => 'Is Sidebar',
        ];
    }

    public static function getCategoriesList()
    {
        return Route::find()
            ->asArray()
            ->select([
                'id',
                'parent_id',
                'title AS name',
                'alias',
                'entity',
                'entity_id',
                'is_active',
                'h1',
                'meta_title',
                'meta_description',
                'meta_keywords'
            ])
            ->where([
                'entity' => 2,
            ])
            ->andWhere([
                'entity' => 3,
            ])
            ->orderBy('[[parent_id]] ASC NULLS FIRST, [[id]] ASC')
            ->indexBy('id')
            ->all();
    }

    public static function getPidList(Array $entities = [], $currentRouteId = null)
    {
        $query = Route::find()
            ->asArray()
            ->select([
                'route.*',
                'route_index.path',
                'route_index.refs',
                'route_index.level',
            ])
            ->innerJoin('route_index', 'route_index.route_id = route.id')
            ->orderBy(['level' => SORT_ASC, 'route.id' => SORT_ASC]);

        if ($entities) {
            $array = ['or'];
            foreach ($entities as $entity) {
                $array[]['entity'] = $entity;
            }
            $query->andWhere($array);
        }

        if ($currentRouteId) {
            $query->andWhere([
                'not', ['id' => $currentRouteId],
            ]);
        }

        $column = [];

        foreach ($query->all() as $row) {

            $refs = preg_replace('/[{}]/', '', $row['refs']);
            $parents = explode(',', $refs);
            $indent = '';

            foreach ($parents as $parent) {

                $title = Route::find()
                    ->select('route.title')
                    ->where(['route.id' => $parent])
                    ->scalar();

                if ($row['level'] == 0) {
                    $indent .= $title;
                } else {
                    $indent .= ' -> ' . $title;
                }
            }
            $column[$row['id']] = $indent;
        }

        return $column;
    }

    public static function getData()
    {
        $sql = <<<SQL
SELECT
   "id",
  CASE WHEN parent_id IS NULL THEN
    '#'
  ELSE
    parent_id::VARCHAR    
  END AS "parent",
  title AS "text",
  entity AS "type",
  entity_id,
  id 
FROM
  route
SQL;

        $data = Yii::$app->db->createCommand($sql)->queryAll();

        return $data;
    }
}
