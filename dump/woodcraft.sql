/*
Navicat PGSQL Data Transfer

Source Server         : woodcraft-local
Source Server Version : 90503
Source Host           : localhost:5432
Source Database       : woodcraft2
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90400
File Encoding         : 65001

Date: 2017-02-11 22:28:06
*/


-- ----------------------------
-- Sequence structure for applications_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "applications_id_seq";
CREATE SEQUENCE "applications_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for entity_catalog_categories_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "entity_catalog_categories_id_seq";
CREATE SEQUENCE "entity_catalog_categories_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 7
 CACHE 1;
SELECT setval('"public"."entity_catalog_categories_id_seq"', 7, true);

-- ----------------------------
-- Sequence structure for entity_catalog_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "entity_catalog_id_seq";
CREATE SEQUENCE "entity_catalog_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;
SELECT setval('"public"."entity_catalog_id_seq"', 1, true);

-- ----------------------------
-- Sequence structure for entity_catalog_instrument_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "entity_catalog_instrument_id_seq";
CREATE SEQUENCE "entity_catalog_instrument_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;
SELECT setval('"public"."entity_catalog_instrument_id_seq"', 1, true);

-- ----------------------------
-- Sequence structure for entity_catalog_wood_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "entity_catalog_wood_id_seq";
CREATE SEQUENCE "entity_catalog_wood_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;
SELECT setval('"public"."entity_catalog_wood_id_seq"', 1, true);

-- ----------------------------
-- Sequence structure for entity_gallery_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "entity_gallery_id_seq";
CREATE SEQUENCE "entity_gallery_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for entity_page_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "entity_page_id_seq";
CREATE SEQUENCE "entity_page_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for entity_services_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "entity_services_id_seq";
CREATE SEQUENCE "entity_services_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for gallery_item_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "gallery_item_id_seq";
CREATE SEQUENCE "gallery_item_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for menu_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "menu_id_seq";
CREATE SEQUENCE "menu_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 6
 CACHE 1;
SELECT setval('"public"."menu_id_seq"', 6, true);

-- ----------------------------
-- Sequence structure for news_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "news_id_seq";
CREATE SEQUENCE "news_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for route_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "route_id_seq";
CREATE SEQUENCE "route_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 12
 CACHE 1;
SELECT setval('"public"."route_id_seq"', 12, true);

-- ----------------------------
-- Sequence structure for route_index_route_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "route_index_route_id_seq";
CREATE SEQUENCE "route_index_route_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for settings_main_page_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "settings_main_page_id_seq";
CREATE SEQUENCE "settings_main_page_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for slider_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "slider_id_seq";
CREATE SEQUENCE "slider_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 6
 CACHE 1;
SELECT setval('"public"."slider_id_seq"', 6, true);

-- ----------------------------
-- Table structure for applications
-- ----------------------------
DROP TABLE IF EXISTS "applications";
CREATE TABLE "applications" (
"id" int4 DEFAULT nextval('applications_id_seq'::regclass) NOT NULL,
"user_name" varchar(255) COLLATE "default",
"user_email" varchar(255) COLLATE "default",
"user_telephone" varchar(255) COLLATE "default",
"user_company" varchar(255) COLLATE "default",
"build_appointment" varchar(255) COLLATE "default",
"status" int2,
"outer_length" char(10) COLLATE "default",
"outer_width" char(10) COLLATE "default",
"outer_height" char(10) COLLATE "default",
"inner_length" char(10) COLLATE "default",
"inner_width" char(10) COLLATE "default",
"inner_height" char(10) COLLATE "default",
"build_foundation" varchar(255) COLLATE "default",
"file_route" varchar(255) COLLATE "default",
"created_at" int4,
"updated_at" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of applications
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for entity_catalog
-- ----------------------------
DROP TABLE IF EXISTS "entity_catalog";
CREATE TABLE "entity_catalog" (
"id" int4 DEFAULT nextval('entity_catalog_id_seq'::regclass) NOT NULL,
"route_id" int4,
"name" varchar(255) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of entity_catalog
-- ----------------------------
BEGIN;
INSERT INTO "entity_catalog" VALUES ('1', '12', null);
COMMIT;

-- ----------------------------
-- Table structure for entity_catalog_categories
-- ----------------------------
DROP TABLE IF EXISTS "entity_catalog_categories";
CREATE TABLE "entity_catalog_categories" (
"id" int4 DEFAULT nextval('entity_catalog_categories_id_seq'::regclass) NOT NULL,
"route_id" int4,
"text" text COLLATE "default",
"image" varchar(255) COLLATE "default",
"created_at" int4,
"updated_at" int4,
"is_show" bool,
"is_sidebar" bool
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of entity_catalog_categories
-- ----------------------------
BEGIN;
INSERT INTO "entity_catalog_categories" VALUES ('1', '4', '<p>йцу</p>', 'uploads/catalog-categories/1620170124171945', '1485274546', '1486215903', null, 't');
INSERT INTO "entity_catalog_categories" VALUES ('2', '5', '', 'uploads/catalog-categories/720170124171836', '1485274716', '1485274716', null, 'f');
INSERT INTO "entity_catalog_categories" VALUES ('3', '6', '<p><strong>НАЗНАЧЕНИЕ:</strong></p>
<p>Данный станок используется в лесопильных производствах высокой мощности (100-200 м3 круглого леса в смену) в качестве станка первого ряда для распиловки бревен за один проход по схемам: либо с брусовкой, либо вразвал на необрезной пиломатериал экспортного качества.</p>
<p><strong>СХЕМА ОБРАБОТКИ:</strong></p>
<p><img src="http://www.stanki.ru/images/stanki/derevo/20/image001.jpg" alt="Схема распиловки брусовального двухвального станка с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="219" height="176" /><img src="http://www.stanki.ru/images/stanki/derevo/20/image002.jpg" alt="Схема распиловки брусовального двухвального станка с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="220" height="176" /><img src="http://www.stanki.ru/images/stanki/derevo/20/image003.jpg" alt="Схема распиловки брусовального двухвального станка с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="220" height="176" /></p>
<p><strong>ОБЛАСТЬ ПРИМЕНЕНИЯ:</strong></p>
<p>Станок специально сконструирован для эффективного пиления низкосортной загрязненной древесины с большой кривизной и сучьями, а деловой древесины в больших объемах. Это достигается за счет уникальной гусеничной системы подачи и конструкции прижимов бревна. При этом качество получаемого пиломатериала &ndash; экспортное, а степень загрязнения не влияет на износ инструмента, так как применятся двухвальная система пиления с направлением зубьев пилы от центра бревна к краю.</p>
<p>&nbsp;</p>
<p><strong>КАРТА ПРОДАЖ СТАНКОВ И ЛИНИЙ KRAFTER</strong></p>
<p><a class="" href="http://www.stanki.ru/map_krafter/" target="_blank" rel="noopener noreferrer"><img src="http://www.stanki.ru/images/stanki/derevo/104/map.png" alt="" /></a></p>
<p><br /><br /><br /></p>
<p><strong>КОНСТРУКТИВНЫЕ ОСОБЕННОСТИ:</strong></p>
<table>
<tbody>
<tr>
<td><img src="http://www.stanki.ru/images/stanki/derevo/20/image004.jpg" alt="Брусовальный двухвальный станок с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;, Двухвальная схема пиления" width="200" height="254" /></td>
<td>
<p><strong>Двухвальная</strong><strong> схема пиления</strong></p>
<p>Данная схема на сегодняшний день признана самой эффективной, поскольку можно использовать пилы меньшего диаметра по сравнению с одновальной схемой. Причем использование пил меньшего диаметра напрямую влияет на увеличение полезного выхода, за счет меньшей толщины пропила. Кроме того, использование пил меньшего диаметра позволяет экономить на стоимости инструмента, а также не требует сложного оборудования для заточки и подготовки пил.</p>
<p>На станке предусмотрена возможность перемещения пильных валов в вертикальном направлении. Это в свою очередь позволяет использовать пилы разного диаметра (от 500мм, до 650мм), а также смещать центр пиления относительно положения центра бревна.</p>
<p>Также отличительной особенностью в данных станках, является использование схемы пиления как брусовкой так и развальной.</p>
</td>
</tr>
<tr>
<td><img src="http://www.stanki.ru/images/stanki/derevo/20/image005.jpg" alt="Брусовальный двухвальный станок с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;, направление пеления" width="200" height="160" /></td>
<td>
<p><strong>Направление пиления</strong></p>
<p>На данном станке реализована схема пиления, направленная от центра бревна к краю, т.е. встречное пиление на обоих валах. Таким образом, что пилы не будут тупиться в зависимости от степени загрязнения бревна. Такая система уникальна, так как предъявляет очень серьезные требования к системе базирования бревна.</p>
</td>
</tr>
<tr>
<td><img src="http://www.stanki.ru/images/stanki/derevo/20/image006.jpg" alt="Подающий транспартер брусовального двухвального станка с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="200" height="133" /><br /><img src="http://www.stanki.ru/images/stanki/derevo/20/image007.jpg" alt="Подающий транспартер брусовального двухвального станка с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="200" height="151" /><br /><img src="http://www.stanki.ru/images/stanki/derevo/20/image008.jpg" alt="Подающий транспартер брусовального двухвального станка с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="200" height="150" /></td>
<td>
<p><strong>Подающий транспортер</strong></p>
<p>В данном станке используется гусеничная система подачи с &laquo;лотковой траверсой&raquo; и пневматическими прижимами бревна. Данная система в свою очередь позволяет:</p>
<p>- в разы лучше и эффективнее фиксировать бревно на подающем конвейере;</p>
<p>- обеспечить прямолинейность подачи при любых условиях</p>
<p>- легко распиливать сильно-искривленные бревна, либо бревна с большими сучками, при этом не нарушается геометрия продуктов на выходе и не портится инструмент.</p>
<p>- обеспечить минимальные межторцовые разрывы между брёвнами в процессе пиления. Другими словами можно легко обеспечить подачу &laquo;торец в торец&raquo;, ч то в свою очередь существенно отражается на увеличении производительности станка в сравнении с аналогами с цепной подачей, упорами в торец.</p>
<p>Отличительные особенности подающего транспортера:</p>
<p>1. По спец заказу возможно изготовление подающего транспортера станка &laquo;KRAFTER&raquo; способного подавать бревна длиной <strong>от 2,5метров</strong></p>
<p>2. Также по спец заказу, возможно, установить дополнительный 3-й прижим бревна.</p>
<p>3. Конструкция гусеницы &ndash; лотковая, что обеспечивает максимально надежную фиксацию бревна на входе</p>
</td>
</tr>
<tr>
<td><img src="http://www.stanki.ru/images/stanki/derevo/20/image009.jpg" alt="Пильный механизм брусовального двухвального станка с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="200" height="152" /></td>
<td>
<p><strong>Пильный механизм</strong></p>
<p>Пильный механизм имеет очень тяжелую конструкцию и оборудован подвижными суппортами для перемещения пильных валов в вертикальном направлении. Перемещение валов позволяет использовать пилы диметром 500-650мм, а также позволяет смещать (нивелировать) центр пиления относительно центра бревна. Конструкция пильного узла выполнена таким образом, что замена постава пил занимает не более 25-30 мин.</p>
</td>
</tr>
<tr>
<td><img src="http://www.stanki.ru/images/stanki/derevo/20/image010.jpg" alt="Брусовальный двухвальный станок с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;, привод пильных валов" width="200" height="133" /><br /><img src="http://www.stanki.ru/images/stanki/derevo/20/image011.jpg" alt="Брусовальный двухвальный станок с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;, привод пильных валов" width="200" height="166" /></td>
<td>
<p><strong>Привод пильных валов (карданные валы <u>KAMAZ</u> )</strong></p>
<p>Передача вращения через карданные валы. Данная система позволяет снизить практически &laquo;в ноль&raquo; нагрузку на опорные подшипники, а также влияет на ресурс всех несущих узлов конструкции, в то время когда в ременной передаче постоянно наблюдается растяжение ремней и повышенная нагрузка на подшипники. Поэтому передача через карданный вал намного предпочтительней.</p>
<p>Также использование карданных валов позволяет перемещать пильные валы при неподвижных двигателях без остановки станка в процессе его работы.</p>
<p>Также при желании данная система позволяет заменять в будущем главные двигатели на более мощные, для увеличения производительности.</p>
<p>В станке KRAFTER используются карданные валы от легендарного автоконцерна KAMAZ, надежность комплектующих которого проверена временем и в рекламе не нуждается.</p>
</td>
</tr>
<tr>
<td><img src="http://www.stanki.ru/images/stanki/derevo/20/image012.jpg" alt="Приемный транспартер брусовального двухвального станка с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="200" height="150" /><br /><img src="http://www.stanki.ru/images/stanki/derevo/20/image013.jpg" alt="Приемный транспартер брусовального двухвального станка с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="200" height="290" /></td>
<td>
<p><strong>Приемный транспортер</strong></p>
<p>Приемный, как и подающий имеет гусеничный конвейер, с парой пневматических боковых зубчатых рябух, которые имеют собственный привод и предназначены для удержания и протяжки боковых горбылей. Также на транспортере дополнительно установлена пара пневматических вертикальных прижимных рябух, предназначенных для надежной фиксации продуктов распила. Данная конструкция позволяет получать пиломатериал на выходе идеального качества.</p>
<p>Отличительные особенности строения гусеницы (подающего механизма):</p>
<p>1. По спец заказу возможно изготовление приемного транспортера станка &laquo;KRAFTER&raquo; способного протягивать и удерживать бревна длиной <strong>от 2,5метров</strong></p>
<p>2. Также по спец заказу возможно установить дополнительные пары боковых прижимов</p>
</td>
</tr>
<tr>
<td><img src="http://www.stanki.ru/images/stanki/derevo/20/image014.jpg" alt="Брусовальный двухвальный станок с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;, пневматические прижижимы бревна" width="200" height="145" /><br /><img src="http://www.stanki.ru/images/stanki/derevo/20/image015.jpg" alt="Конструкция рябух брусовального двухвального станка с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="200" height="153" /><br /><img src="http://www.stanki.ru/images/stanki/derevo/20/image016.jpg" alt="Конструкция рябух брусовального двухвального станка с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="200" height="150" /></td>
<td>
<p><strong>Пневматические прижимы бревна</strong></p>
<p>На подающем транспортере установлены 2 мощных пневматических прижима бревна, которые позволяют максимально надежно и жестко фиксировать бревно, прижимая его к гусенице, при чем конструкция этих прижимов сделана таким образом, что исключает &laquo;забивание&raquo; корой, поэтому проскальзывание бревна полностью исключено, даже при условии, если бревно сильно искривлено.</p>
<p>На приемном транспортере также установлены 2 мощных вертикальных прижима + 2 боковых прижима, которые удерживают горбыль.</p>
<p>По спец исполнению возможно установка дополнительных вертикальных и горизонтальных прижимов для пиления бревен от 2,5 метров.</p>
<p><strong>Конструкция рябух</strong></p>
<p>В отличие от конкурентов, прижимные рябухи изготавливаются из шипованных модулей. Данные модули производятся на лазерном металлообрабатывающем центре, поэтому кромки шипов на рябухах проходят закалку. Это, в свою очередь, повышает твердость, стойкость и самое главное долговечность рябух.</p>
<p>Треки гусеницы изготавливаются также лазерном металлообрабатывающем центре</p>
</td>
</tr>
<tr>
<td><img src="http://www.stanki.ru/images/stanki/derevo/20/image017.jpg" alt="Когтевая защита брусовального двухвального станка с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="200" height="237" /></td>
<td>
<p><strong>Когтевая защита</strong></p>
<p>На подающем транспортере в обязательно порядке установлена когтевая защита, которая препятствует обратному выбросу бревна. Когтевые лучи изготовлены из тяжелого металла, что в свою очередь говорит о бесспорной надежности данной системы защиты.</p>
</td>
</tr>
<tr>
<td><img src="http://www.stanki.ru/images/stanki/derevo/20/image018.jpg" alt="Защитный модуль брусовального двухвального станка с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="200" height="249" /></td>
<td>
<p><strong>Защитный модуль</strong></p>
<p>Предназначена для того, чтобы оператор не смог подать слишком искривленное бревно, или диаметром выше максимально возможного. При подаче таких бревен на подающем транспортёре срабатывает концевик, который останавливает подающий транспортер, чтобы оператор мог предотвратить застревание бревна в станке. Затем оператор должен поднять пильный узел до тех пор, пока концевик не вернется в &laquo;свободное&raquo; положение. Данный узел расположен непосредственно перед подающим транспортером. Соответственно, при необходимости возврата бревна, его <strong>не нужно</strong> изначально доводить практически до самого пильного узла (как на аналогах), так как концевик находится на входе перед подающим транспортером. Следовательно будет тратиться меньше времени, для того, чтобы вернуть бревно обратно.</p>
</td>
</tr>
<tr>
<td><img src="http://www.stanki.ru/images/stanki/derevo/20/image019.jpg" alt="Пульт управления брусовального двухвального станок с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="200" height="138" /></td>
<td>
<p><strong>Пульт управления</strong></p>
<p>Эргономичный выносной пульт управления специально создан для эффективной и комфортной работы оператора.</p>
</td>
</tr>
<tr>
<td><img src="http://www.stanki.ru/images/stanki/derevo/20/image020.jpg" alt="Дополнительный комплект боковых прижимных рябух брусовального двухвального станка с гусеничной подачей мод. &amp;laquo;KRAFTER&amp;raquo;" width="200" /></td>
<td>
<p><strong>Дополнительный комплект боковых прижимных рябух (ОПЦИЯ)</strong></p>
<p>Необходимы для пиления бревен длиной от 2,5м.</p>
</td>
</tr>
</tbody>
</table>
<p><strong>ДОПОЛНИТЕЛЬНАЯ КОМПЛЕКТАЦИЯ:</strong></p>
<p>При необходимости, станок &laquo;KRAFTER&raquo; может быть укомплектован всем спектром межстаночной механизации:</p>
<p>- Эстакада для подачи бревен;</p>
<p>- Подающий конический транспортер для бревен;</p>
<p>- Приемный транспортер с отделением продуктов распила.</p>', 'uploads/catalog-categories/8720170124172157', '1485274917', '1485274917', null, 'f');
INSERT INTO "entity_catalog_categories" VALUES ('4', '8', '', 'uploads/catalog-categories/8620170128095458', '1485593698', '1485593698', null, 't');
INSERT INTO "entity_catalog_categories" VALUES ('5', '9', '', 'uploads/catalog-categories/6620170128095725', '1485593845', '1486215914', null, 't');
INSERT INTO "entity_catalog_categories" VALUES ('6', '10', '<p><strong>НАЗНАЧЕНИЕ:</strong></p>
<p>Станок разработан специально для рационального распила круглого леса дисковыми пилами на двухкантный брус, необрезную доску и горбыль. Станок идеально подходит для переработки тонкомера, и баланса, так как имеет двухвальную структуру и за счет пил небольшого диаметра получается минимальный пропил.</p>
<p><strong>ОБЛАСТЬ ПРИМЕНЕНИЯ:</strong></p>
<p>Широко применяется в паллетном производстве, также применяется в лесопильных цехах небольшой производительности.</p>
<p>Для удобства транспортировки рама станка легко разбирается на две части.</p>
<p><strong>СХЕМА ОБРАБОТКИ:</strong></p>
<p><img src="http://www.stanki.ru/images/stanki/derevo/138/image004.jpg" width="100" height="107" /><img src="http://www.stanki.ru/images/stanki/derevo/138/scheme-2.jpg" width="100" height="107" /></p>
<p><strong>КОНСТРУКТИВНЫЕ ОСОБЕННОСТИ:</strong></p>
<table border="1">
<tbody>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image006.png" width="230" height="69" /></td>
<td>
<p>Абсолютно все детали изготавливаются на высокоточном металлообрабатывающем центре с ЧПУ MAZAK (Япония)</p>
</td>
</tr>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image007.png" width="150" height="150" /></td>
<td>
<p><strong>Температурный режим</strong></p>
<p>Станок специально разработан для эксплуатации в не отапливаемых помещения и при низких температурах, так как в нем станке отсутствует пневматика и гидравлика.</p>
</td>
</tr>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image008.jpg" width="230" height="184" /></td>
<td>
<p><strong>Схема пиления</strong></p>
<p>На данном станке реализована схема пиления, направленная от центра бревна к краю, т.е. встречное пиление на обоих валах. Таким образом, что пилы не будут тупиться в зависимости от степени загрязнения бревна. Такая система уникальна, так как предъявляет очень серьезные требования к системе базирования бревна.</p>
</td>
</tr>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image009.jpg" width="230" height="345" /></td>
<td>
<p><strong>Прямой привод пил</strong></p>
<p>Двигатели работают в прямом приводе без ременных шкивов и клиновых ремней. При этом выше к.п.д. механизма привода пилы и достаточно менее мощных двигателей, чем у станков с ременной передачей.</p>
</td>
</tr>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image010.jpg" width="230" height="307" /></td>
<td>
<p><strong>Цепная подача</strong></p>
<p>Цепная система подачи бревна упором в торец обеспечивает надежную подачу бревна. В стандартном исполнении станки поставляются с зубчатой цепью. В спец.исполнении станок возможно укомплектовать цепью с откидными упорами или стационарными</p>
</td>
</tr>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image011.jpg" width="230" height="407" /></td>
<td>
<p><strong>Расклинивающие ножи</strong></p>
<p>Мощные расклинивающие ножи на выходе из станка препятствуют зажиму пил в процессе работы, существенно продлевая ресурс инструмента.</p>
</td>
</tr>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image012.jpg" width="230" height="153" /></td>
<td>
<p><strong>Аспирация</strong></p>
<p>Для эффективного удаления опилок используется ленточный транспортер, который позволяет работать на высоких скоростях подачи.</p>
<p>Аспирационные патрубки позволяют эффективно производить отвод опилок не тратя время на остановку станка для уборки отходов</p>
</td>
</tr>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image013.jpg" width="230" height="153" /></td>
<td>
<p><strong>Пульт управления</strong></p>
<p>Удобный и понятный пульт управления, позволяет оперативно управлять всеми функциями станка.</p>
</td>
</tr>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image014.jpg" width="230" height="153" /></td>
<td>
<p><strong>Электрика</strong></p>
<p>В конструкции электрошкафа, используется надежная морозостойкая европейская электрика.</p>
</td>
</tr>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image015.jpg" width="230" height="153" /></td>
<td>
<p><strong>Дополнительные рябухи</strong></p>
<p>На станке, помимо цепи, имеются протягивающие рябухи, которые помогают эффективно подавать и протягивать кругляк длинной от 1,2м.</p>
</td>
</tr>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image016.jpg" width="230" height="307" /></td>
<td>
<p><strong>Ограничитель диаметра бревна</strong></p>
<p>В случае подачи бревна диаметром больше максимального автоматически срабатывает ограничитель, останавливая подачу и препятствуя заклиниванию станка.</p>
</td>
</tr>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image017.jpg" width="230" height="153" /></td>
<td>
<p><strong>Электромагнитный замок</strong></p>
<p>Данный замок установлен на защитном кожухе, который препятствует доступу в пильный узел, что соответствует европейским нормам и стандартам безопасности.</p>
</td>
</tr>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image018.jpg" width="230" height="345" /></td>
<td>
<p><strong>Когтевая защита</strong></p>
<p>Когтевая защита на входе в станок препятствует выбросу заготовки и обеспечивает безопасную работу для оператора.</p>
</td>
</tr>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image019.jpg" width="230" height="344" /></td>
<td>
<p><strong>Регулировочные опоры</strong></p>
<p>Регулировочные опоры позволяют быстро настроить станок на нужную высоту относительно механизации</p>
</td>
</tr>
<tr>
<td align="center"><img src="http://www.stanki.ru/images/stanki/derevo/138/image020.png" width="230" height="230" /></td>
<td>Станок имеет сертификат СЕ.</td>
</tr>
</tbody>
</table>
<p><strong>ДОПОЛНИТЕЛЬНЫЕ ОПЦИИ:</strong></p>
<table border="1" width="100%" cellspacing="1" cellpadding="1">
<tbody>
<tr>
<td width="230"><img src="http://www.stanki.ru/images/stanki/derevo/138/d-1.jpg" alt="" width="230" /></td>
<td>
<p><strong>Кантователь для станка на подающем столе</strong></p>
<p>Кантователь позволяет позиционировать бревно максимально удачным образом с учетом кривизны и сучков. Данная функция позволяет увеличить полезный выход готовой продукции.</p>
</td>
</tr>
<tr>
<td width="230"><img src="http://www.stanki.ru/images/stanki/derevo/138/d-2.jpg" alt="" width="230" /></td>
<td>
<p><strong>Приемный стол на выходе из станка</strong></p>
<p>Вытяжные вальцы, позволяют протягивать горбыль на выходе из станка. Рекомендуется к установке в поточных линиях.</p>
</td>
</tr>
<tr>
<td width="230"><img src="http://www.stanki.ru/images/stanki/derevo/138/d-3.jpg" alt="" width="230" /></td>
<td>
<p><strong>Загрузочная эстакада</strong></p>
<p>Предназначена для автоматической загрузки бревен на подающий стол брусовального ста</p>
</td>
</tr>
</tbody>
</table>', 'uploads/catalog-categories/3620170128100258', '1485594178', '1485594178', null, 't');
INSERT INTO "entity_catalog_categories" VALUES ('7', '11', '<p>Тестовый текст</p>', 'uploads/catalog-categories/5220170128181022', '1485623422', '1485623422', null, 't');
COMMIT;

-- ----------------------------
-- Table structure for entity_catalog_instrument
-- ----------------------------
DROP TABLE IF EXISTS "entity_catalog_instrument";
CREATE TABLE "entity_catalog_instrument" (
"id" int4 DEFAULT nextval('entity_catalog_instrument_id_seq'::regclass) NOT NULL,
"route_id" int4,
"name" varchar(255) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of entity_catalog_instrument
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for entity_catalog_wood
-- ----------------------------
DROP TABLE IF EXISTS "entity_catalog_wood";
CREATE TABLE "entity_catalog_wood" (
"id" int4 DEFAULT nextval('entity_catalog_wood_id_seq'::regclass) NOT NULL,
"route_id" int4,
"name" varchar(255) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of entity_catalog_wood
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for entity_gallery
-- ----------------------------
DROP TABLE IF EXISTS "entity_gallery";
CREATE TABLE "entity_gallery" (
"id" int4 DEFAULT nextval('entity_gallery_id_seq'::regclass) NOT NULL,
"route_id" int4,
"image" varchar(255) COLLATE "default",
"description" text COLLATE "default",
"created_at" int4,
"updated_at" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of entity_gallery
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for entity_page
-- ----------------------------
DROP TABLE IF EXISTS "entity_page";
CREATE TABLE "entity_page" (
"id" int4 DEFAULT nextval('entity_page_id_seq'::regclass) NOT NULL,
"route_id" int4,
"text" text COLLATE "default",
"created_at" int4,
"updated_at" int4,
"is_sidebar" bool DEFAULT false
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of entity_page
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for entity_services
-- ----------------------------
DROP TABLE IF EXISTS "entity_services";
CREATE TABLE "entity_services" (
"id" int4 DEFAULT nextval('entity_services_id_seq'::regclass) NOT NULL,
"route_id" int4,
"image" varchar(255) COLLATE "default",
"description" text COLLATE "default",
"created_at" int4,
"updated_at" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of entity_services
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for gallery_item
-- ----------------------------
DROP TABLE IF EXISTS "gallery_item";
CREATE TABLE "gallery_item" (
"id" int4 DEFAULT nextval('gallery_item_id_seq'::regclass) NOT NULL,
"gallery_id" int4,
"name" varchar(255) COLLATE "default",
"image" varchar(255) COLLATE "default",
"is_active" bool,
"created_at" int4,
"updated_at" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of gallery_item
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS "menu";
CREATE TABLE "menu" (
"id" int4 DEFAULT nextval('menu_id_seq'::regclass) NOT NULL,
"route_id" int4,
"name" varchar(255) COLLATE "default",
"position" varchar(255) COLLATE "default",
"sort" int4,
"is_active" bool
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of menu
-- ----------------------------
BEGIN;
INSERT INTO "menu" VALUES ('6', '12', null, 'middle_menu', '1', 't');
COMMIT;

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS "migration";
CREATE TABLE "migration" (
"version" varchar(180) COLLATE "default" NOT NULL,
"apply_time" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of migration
-- ----------------------------
BEGIN;
INSERT INTO "migration" VALUES ('m000000_000000_base', '1485273892');
INSERT INTO "migration" VALUES ('m160504_000001_create_route', '1485273911');
INSERT INTO "migration" VALUES ('m160504_000002_create_route_index', '1485273911');
INSERT INTO "migration" VALUES ('m160504_000003_create_entity_page', '1485273911');
INSERT INTO "migration" VALUES ('m160504_000004_create_menu', '1485273911');
INSERT INTO "migration" VALUES ('m160504_000005_create_settings_main_page', '1485273912');
INSERT INTO "migration" VALUES ('m160504_000006_add_column_entity_page', '1485273912');
INSERT INTO "migration" VALUES ('m160504_000008_create_gallery', '1485273912');
INSERT INTO "migration" VALUES ('m160504_000009_create_gallery_item', '1485273912');
INSERT INTO "migration" VALUES ('m160504_000010_create_news', '1485273912');
INSERT INTO "migration" VALUES ('m160504_000011_create_slider', '1485273912');
INSERT INTO "migration" VALUES ('m160504_000012_create_applications', '1485273912');
INSERT INTO "migration" VALUES ('m160504_000013_create_entity_catalog', '1485273912');
INSERT INTO "migration" VALUES ('m160504_000015_alter_entity_page', '1485273912');
INSERT INTO "migration" VALUES ('m160504_000016_create_entity_catalog_categories', '1485273912');
INSERT INTO "migration" VALUES ('m160504_000017_entity_catalog_instrument', '1485273912');
INSERT INTO "migration" VALUES ('m160504_000018_entity_catalog_wood', '1485273913');
INSERT INTO "migration" VALUES ('m160504_000019_entity_services', '1485273913');
COMMIT;

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS "news";
CREATE TABLE "news" (
"id" int4 DEFAULT nextval('news_id_seq'::regclass) NOT NULL,
"title" varchar(255) COLLATE "default",
"alias" varchar(255) COLLATE "default",
"short_text" text COLLATE "default",
"text" text COLLATE "default",
"image" varchar(255) COLLATE "default",
"meta_title" varchar(255) COLLATE "default",
"meta_description" varchar(255) COLLATE "default",
"meta_keywords" varchar(255) COLLATE "default",
"created_at" int4,
"updated_at" int4,
"status" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of news
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for route
-- ----------------------------
DROP TABLE IF EXISTS "route";
CREATE TABLE "route" (
"id" int4 DEFAULT nextval('route_id_seq'::regclass) NOT NULL,
"title" varchar(255) COLLATE "default",
"alias" varchar(255) COLLATE "default",
"parent_id" int4,
"entity" int4,
"entity_id" int4,
"meta_title" varchar(255) COLLATE "default",
"meta_description" text COLLATE "default",
"meta_keywords" text COLLATE "default",
"is_active" bool,
"sort" int4,
"created_at" int4,
"updated_at" int4
)
WITH (OIDS=FALSE)

;
COMMENT ON COLUMN "route"."title" IS 'Заголовок';

-- ----------------------------
-- Records of route
-- ----------------------------
BEGIN;
INSERT INTO "route" VALUES ('4', 'Лесопильное оборудование', 'lesopilnoe-oborudovanie', '12', '5', '1', null, '', '', 't', null, '1485274546', '1486215903');
INSERT INTO "route" VALUES ('5', 'Бревнопильные дисковые станки', 'brevnopilnye-diskovye-stanki', '4', '5', '2', null, '', '', 't', null, '1485274716', '1485274716');
INSERT INTO "route" VALUES ('6', 'Брусовальный двухвальный станок с гусеничной подачей мод. «KRAFTER»', 'brusovalnyy-dvuhvalnyy-stanok-s-gusenichnoy-podachey-mod-krafter', '5', '5', '3', null, '', '', 't', null, '1485274917', '1485274917');
INSERT INTO "route" VALUES ('8', 'Пилорамы рамные', 'piloramy-ramnye', '4', '5', '4', null, '', '', 't', null, '1485593698', '1485593698');
INSERT INTO "route" VALUES ('9', 'Столярные станки', 'stolyarnye-stanki', '12', '5', '5', null, '', '', 't', null, '1485593845', '1486215914');
INSERT INTO "route" VALUES ('10', 'Бревнопильные станки TD-350 KBA, TD-450 KBA', 'td-350', '5', '5', '6', null, '', '', 't', null, '1485594178', '1485594178');
INSERT INTO "route" VALUES ('11', 'пилорама 1', 'pilorama-1', '8', '5', '7', null, '', '', 't', null, '1485623422', '1485623422');
INSERT INTO "route" VALUES ('12', 'Каталог', 'katalog', null, '8', '1', '', '', '', 't', null, '1486215737', '1486215737');
COMMIT;

-- ----------------------------
-- Table structure for route_index
-- ----------------------------
DROP TABLE IF EXISTS "route_index";
CREATE TABLE "route_index" (
"route_id" int4 DEFAULT nextval('route_index_route_id_seq'::regclass) NOT NULL,
"path" varchar(255) COLLATE "default",
"level" int2,
"refs" int4[]
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of route_index
-- ----------------------------
BEGIN;
INSERT INTO "route_index" VALUES ('4', '/katalog/lesopilnoe-oborudovanie', '1', '{12,4}');
INSERT INTO "route_index" VALUES ('5', '/katalog/lesopilnoe-oborudovanie/brevnopilnye-diskovye-stanki', '2', '{12,4,5}');
INSERT INTO "route_index" VALUES ('6', '/katalog/lesopilnoe-oborudovanie/brevnopilnye-diskovye-stanki/brusovalnyy-dvuhvalnyy-stanok-s-gusenichnoy-podachey-mod-krafter', '3', '{12,4,5,6}');
INSERT INTO "route_index" VALUES ('8', '/katalog/lesopilnoe-oborudovanie/piloramy-ramnye', '2', '{12,4,8}');
INSERT INTO "route_index" VALUES ('9', '/katalog/stolyarnye-stanki', '1', '{12,9}');
INSERT INTO "route_index" VALUES ('10', '/katalog/lesopilnoe-oborudovanie/brevnopilnye-diskovye-stanki/td-350', '3', '{12,4,5,10}');
INSERT INTO "route_index" VALUES ('11', '/katalog/lesopilnoe-oborudovanie/piloramy-ramnye/pilorama-1', '3', '{12,4,8,11}');
INSERT INTO "route_index" VALUES ('12', '/katalog', '0', '{12}');
COMMIT;

-- ----------------------------
-- Table structure for settings_main_page
-- ----------------------------
DROP TABLE IF EXISTS "settings_main_page";
CREATE TABLE "settings_main_page" (
"id" int4 DEFAULT nextval('settings_main_page_id_seq'::regclass) NOT NULL,
"title" varchar(255) COLLATE "default",
"info_text" text COLLATE "default",
"status" int2,
"image" varchar(255) COLLATE "default",
"video" text COLLATE "default",
"number" varchar(255) COLLATE "default",
"position" varchar(50) COLLATE "default",
"sort" int2 DEFAULT 0
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of settings_main_page
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for slider
-- ----------------------------
DROP TABLE IF EXISTS "slider";
CREATE TABLE "slider" (
"id" int4 DEFAULT nextval('slider_id_seq'::regclass) NOT NULL,
"title" varchar(255) COLLATE "default",
"text" text COLLATE "default",
"image" varchar(255) COLLATE "default",
"link" varchar(50) COLLATE "default",
"status" int2,
"sort" int2 DEFAULT 0,
"created_at" int4,
"updated_at" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of slider
-- ----------------------------
BEGIN;
INSERT INTO "slider" VALUES ('6', 'Лес', 'ЛЕст текст', 'uploads/slider/3620170124173342', '', '1', '0', '1485275622', '1485275751');
COMMIT;

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------
ALTER SEQUENCE "applications_id_seq" OWNED BY "applications"."id";
ALTER SEQUENCE "entity_catalog_categories_id_seq" OWNED BY "entity_catalog_categories"."id";
ALTER SEQUENCE "entity_catalog_id_seq" OWNED BY "entity_catalog"."id";
ALTER SEQUENCE "entity_catalog_instrument_id_seq" OWNED BY "entity_catalog_instrument"."id";
ALTER SEQUENCE "entity_catalog_wood_id_seq" OWNED BY "entity_catalog_wood"."id";
ALTER SEQUENCE "entity_gallery_id_seq" OWNED BY "entity_gallery"."id";
ALTER SEQUENCE "entity_page_id_seq" OWNED BY "entity_page"."id";
ALTER SEQUENCE "entity_services_id_seq" OWNED BY "entity_services"."id";
ALTER SEQUENCE "gallery_item_id_seq" OWNED BY "gallery_item"."id";
ALTER SEQUENCE "menu_id_seq" OWNED BY "menu"."id";
ALTER SEQUENCE "news_id_seq" OWNED BY "news"."id";
ALTER SEQUENCE "route_id_seq" OWNED BY "route"."id";
ALTER SEQUENCE "route_index_route_id_seq" OWNED BY "route_index"."route_id";
ALTER SEQUENCE "settings_main_page_id_seq" OWNED BY "settings_main_page"."id";
ALTER SEQUENCE "slider_id_seq" OWNED BY "slider"."id";

-- ----------------------------
-- Primary Key structure for table applications
-- ----------------------------
ALTER TABLE "applications" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table entity_catalog
-- ----------------------------
ALTER TABLE "entity_catalog" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table entity_catalog_categories
-- ----------------------------
ALTER TABLE "entity_catalog_categories" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table entity_catalog_instrument
-- ----------------------------
ALTER TABLE "entity_catalog_instrument" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table entity_catalog_wood
-- ----------------------------
ALTER TABLE "entity_catalog_wood" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table entity_gallery
-- ----------------------------
ALTER TABLE "entity_gallery" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table entity_page
-- ----------------------------
ALTER TABLE "entity_page" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table entity_services
-- ----------------------------
ALTER TABLE "entity_services" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table gallery_item
-- ----------------------------
ALTER TABLE "gallery_item" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table menu
-- ----------------------------
ALTER TABLE "menu" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table migration
-- ----------------------------
ALTER TABLE "migration" ADD PRIMARY KEY ("version");

-- ----------------------------
-- Primary Key structure for table news
-- ----------------------------
ALTER TABLE "news" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table route
-- ----------------------------
ALTER TABLE "route" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table route_index
-- ----------------------------
ALTER TABLE "route_index" ADD PRIMARY KEY ("route_id");

-- ----------------------------
-- Primary Key structure for table settings_main_page
-- ----------------------------
ALTER TABLE "settings_main_page" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table slider
-- ----------------------------
ALTER TABLE "slider" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Key structure for table "entity_catalog"
-- ----------------------------
ALTER TABLE "entity_catalog" ADD FOREIGN KEY ("route_id") REFERENCES "route" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Key structure for table "entity_catalog_categories"
-- ----------------------------
ALTER TABLE "entity_catalog_categories" ADD FOREIGN KEY ("route_id") REFERENCES "route" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Key structure for table "entity_catalog_instrument"
-- ----------------------------
ALTER TABLE "entity_catalog_instrument" ADD FOREIGN KEY ("route_id") REFERENCES "route" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Key structure for table "entity_catalog_wood"
-- ----------------------------
ALTER TABLE "entity_catalog_wood" ADD FOREIGN KEY ("route_id") REFERENCES "route" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Key structure for table "entity_gallery"
-- ----------------------------
ALTER TABLE "entity_gallery" ADD FOREIGN KEY ("route_id") REFERENCES "route" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Key structure for table "entity_page"
-- ----------------------------
ALTER TABLE "entity_page" ADD FOREIGN KEY ("route_id") REFERENCES "route" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Key structure for table "entity_services"
-- ----------------------------
ALTER TABLE "entity_services" ADD FOREIGN KEY ("route_id") REFERENCES "route" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Key structure for table "gallery_item"
-- ----------------------------
ALTER TABLE "gallery_item" ADD FOREIGN KEY ("gallery_id") REFERENCES "entity_gallery" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Key structure for table "menu"
-- ----------------------------
ALTER TABLE "menu" ADD FOREIGN KEY ("route_id") REFERENCES "route" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Key structure for table "route"
-- ----------------------------
ALTER TABLE "route" ADD FOREIGN KEY ("parent_id") REFERENCES "route" ("id") ON DELETE SET NULL ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Key structure for table "route_index"
-- ----------------------------
ALTER TABLE "route_index" ADD FOREIGN KEY ("route_id") REFERENCES "route" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
