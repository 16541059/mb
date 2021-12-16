<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => ' ',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Anasayfa</b>',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-dark',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-dark',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-dark',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'admin/dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => "user/profile",

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => true,
        ],
        [
            'type'         => 'darkmode-widget',
            'topnav_right' => true, // Or "topnav => true" to place on the left.
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],


        [
            'text'    => 'Öğrenci İşlemleri',
            'icon'    => 'fas fa-user-graduate',
            'submenu' => [
                [
                    'text' => 'Öğrenci Kaydet',
                    'route'  => 'admin.users.add',
                    'icon'=>'fas fa-angle-right',
                ],
                [
                    'text' => 'Öğrenci Listesi',
                    'route'  => 'admin.users.index',
                    'icon'=>'fas fa-angle-right',
                ],


            ],
        ],
        [
            'text'    => 'Sınav İşlemleri',
            'icon'    => 'fas fa-file-signature',
            'submenu' => [
                [
                    'text' => 'Sınav Oluştur',
                    'route'  => 'admin.exam.add',
                    'icon'=>'fas fa-angle-right',
                ],
                [
                    'text' => 'Sınav Listesi',
                    'route'  => 'admin.exam.index',
                    'icon'=>'fas fa-angle-right',
                ],
                [
                    'text' => 'Sınav Sonuçları',
                    'route'  => 'admin.examresult.index',
                    'icon'=>'fas fa-angle-right',
                ],


            ],
        ],
        [
            'text'    => 'Başvurular',
            'icon'    => 'fas fa-user-plus',
            'submenu' => [
                [
                    'text' => 'Ön Kayıt',
                    'route'  => 'admin.onkayit.index',
                    'icon'=>'fas fa-angle-right',
                ],
                [
                    'text' => 'Seviye Tespit Sınavı',
                    'route'  => 'admin.resultplacement.index',
                    'icon'=>'fas fa-angle-right',
                ],


            ],
        ],
        [
            'text'    => 'Placement Test',
            'icon'    => 'fas fa-book',
            'submenu' => [
                [
                    'text' => 'Sorular',
                    'route'  => 'admin.seviyesinav.index',
                    'icon'=>'fas fa-angle-right',
                ],
                [
                    'text' => 'Soru Ekle',
                    'route'  => 'admin.seviyesinav.add',
                    'icon'=>'fas fa-angle-right',
                ],


            ],
        ],
        [
            'text'    => 'Kampanyalar',
            'icon'    => 'fas fa-bell',
            'submenu' => [
                [
                    'text' => 'Kampanyalar',
                    'route'  => 'admin.campaing.index',
                    'icon'=>'fas fa-angle-right',
                ],
                [
                    'text' => 'Kampanya Ekle',
                    'route'  => 'admin.campaing.add',
                    'icon'=>'fas fa-angle-right',
                ],


            ],
        ],
        [
            'text'    => 'Hakkımda',
            'icon'    => 'fas fa-address-card',
            'submenu' => [
                [
                    'text' => 'Hakkımda',
                    'route'  => 'admin.hakkımda.index',
                    'icon'=>'fas fa-angle-right',
                ],
                [
                    'text' => 'Neden Biz',
                    'route'  => 'admin.whyus.index',
                    'icon'=>'fas fa-angle-right',
                ],


            ],
        ],
        [
            'text'    => 'Eğitimler',
            'icon'    => 'fas fa-user-graduate',
            'submenu' => [
                [
                    'text' => 'Eğitimler',
                    'route'  => 'admin.egitim.index',
                    'icon'=>'fas fa-angle-right',
                ],
                [
                    'text' => 'Eğitim Ekle',
                    'route'  => 'admin.egitim.add',
                    'icon'=>'fas fa-angle-right',
                ],

            ],
        ],
        [
            'text'    => 'Diller',
            'icon'    => 'fas fa-language',
            'submenu' => [
                [
                    'text' => 'Diller',
                    'route'  => 'admin.language.index',
                    'icon'=>'fas fa-angle-right',
                ],
                [
                    'text' => 'Diller Ekle',
                    'route'  => 'admin.language.add',
                    'icon'=>'fas fa-angle-right',
                ],

            ],
        ],
        [
            'text'    => 'Slider',
            'icon'    => 'fab fa-slideshare',
            'submenu' => [
                [
                    'text' => 'Slider Öğeleri',
                    'route'  => 'admin.slider.index',
                    'icon'=>'fas fa-angle-right',
                ],
                [
                    'text' => 'Slider Öğe Ekle',
                    'route'  => 'admin.slider.add',
                    'icon'=>'fas fa-angle-right',
                ],

            ],
        ],
        [
            'text'    => 'Galeri',
            'icon'    => 'fas fa-images',
            'submenu' => [
                [
                    'text'        => 'Fotoğraf Galerisi',
                    'route'         => 'admin.image.index',
                    'icon'=>'fas fa-angle-right',
                    'label_color' => 'success',
                ],

                [
                    'text'        => 'Refaranslar',
                    'route'         => 'admin.refrans.index',
                    'icon'=>'fas fa-angle-right',
                    'label_color' => 'success',
                ],
                [
                    'text'        => 'Video Galerisi',
                    'route'         => 'admin.video.index',
                    'icon'=>'fas fa-angle-right',
                    'label_color' => 'success',
                ],

            ],
        ],
        [
            'text'    => 'Site Ayarıları',
            'icon'    => 'fas fa-cog',
            'submenu' => [
                [
                    'text'        => 'Popup Ayarları',
                    'route'         => 'admin.popup.index',
                    'icon'=>'fas fa-angle-right',
                    'label_color' => 'success',
                ],
                [
                    'text'        => 'Sözleşme Ayarları',
                    'route'         => 'admin.privacy.index',
                    'icon'=>'fas fa-angle-right',
                    'label_color' => 'success',
                ],


            ],
        ],
        [
            'text'    => 'Gelen Kutusu',
            'icon'    => 'fas fa-envelope',
            'route'         => 'admin.contact.index',
            'label_color' => 'success',

        ],
        [
            'text'    => 'Mail Gönder',
            'icon'    => 'far fa-envelope',
            'route'         => 'admin.abone.index',
            'label_color' => 'success',

        ],
        ['header' => 'account_settings'],
        [
            'text' => 'profile',
            'url'  => 'user/profile',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'Kullanıcılar',
            'route'  => 'admin.admin.index',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'Kullanıcı Ekle',
            'route'  => 'admin.admin.add',
            'icon' => 'fas fa-fw fa-user-plus',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@11',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'summernote' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js',
                ],
            ],
        ],
        'index' => [
            'active' => true,
            'files' => [

                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'js/index.js',
                ],
            ],
        ],

        'ligtbox' => [
            'active' => true,
            'files' => [

                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css',
                ],
            ],
        ],
        'dropzone' => [
            'active' => true,
            'files' => [

                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.1/dropzone-min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.1/basic.min.css',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
