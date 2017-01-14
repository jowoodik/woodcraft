<?php

namespace app\models;

class SettingsMainPage extends BaseSettingsMainPage
{
    public static $positions = [
        'meta_title'        => 'Мета заголовок',
        'meta_description'  => 'Мета описание',
        'meta_keywords'     => 'Мета ключевые слова',
        'site_title'        => 'Заголовок сайта',
        'about_title'       => 'Заголовок о компании',
        'advantages_title'  => 'Заголовок Преимущества',
        'quality_title'     => 'Заголовок Качества',
        'contacts_header'   => 'Контакты в шапке',
        'contacts_footer'   => 'Контакты в подвале',
        'slider_title'      => 'Заголовок слайдера',
        'email_header'      => 'Почта в шапке',
        'email_footer'      => 'Почта в подвале',
        'social_buttons'    => 'Ссылки на соц. сети',
        'address_footer'    => 'Адрес в подвале',
        'text_1'            => 'Первый текст',
        'sign-1'            => 'Первая подпись',
        'text_2'            => 'Второй текст',
        'sign-2'            => 'Вторая подпись',
        'text_3'            => 'Третий текст',
        'sign-3'            => 'Третий подпись',
        'text_4'            => 'Четвертый текст',
        'red-sign'          => 'Красная подпись',
        'advantages-text-1' => 'Преимущества, текст 1',
        'advantages-list'   => 'Список преимуществ',
        'advantages-text-2' => 'Преимущества, текст 2',
        'quality-subtitle'  => 'Качество подзагаловок',
        'quality-list'      => 'Качество Список',
        'catalog-link'      => 'Прайс-лист',
        'main_page_image'   => 'Изображение главной страницы'

    ];

    public function attributeLabels()
    {
        return [
            'position' => 'Позиция'
        ];
    }
}