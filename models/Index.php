<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12.04.16
 * Time: 16:11
 */

namespace app\models;


use /** @noinspection PhpMethodOrClassCallIsNotCaseSensitiveInspection */
    Yii;

class Index
{
    public static function routes()
    {
        $sql = <<<SQL
WITH RECURSIVE r AS (
  SELECT
    "id",
    "alias" || '' AS "path",
    ARRAY["id"] AS "refs",
    0 AS "level"
  FROM
    route
  WHERE
      parent_id IS NULL
  UNION
  SELECT
    route."id",
    r."path" || '/' || route."alias" AS "path",
    r."refs" || route."id" AS "refs",
    r."level" + 1
  FROM
    route
  JOIN r ON route.parent_id = r."id"
) 
INSERT INTO route_index ("route_id", "path", "refs", "level") (
  SELECT
    "id",
    '/' || "path",
    "refs",
    "level"
  FROM r
) ON CONFLICT ("route_id") DO
UPDATE SET 
  "path" = EXCLUDED."path",
  "level" = EXCLUDED."level",
  "refs" = EXCLUDED."refs";
SQL;

        $cmd = Yii::$app->db->createCommand($sql);

        return $cmd->execute();
    }
}
