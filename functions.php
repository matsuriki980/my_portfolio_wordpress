        <?php
        function my_theme_enqueue_assets()
        {
            // ----------------------------------------------------------------------------------------------------
            // CSS の読み込み
            // ----------------------------------------------------------------------------------------------------

            // Google Fonts
            wp_enqueue_style(
                'google-fonts',
                'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP:wght@100..900&display=swap',
                array(),
                null
            );

            // style.css 
            wp_enqueue_style(
                'style',
                get_template_directory_uri() . '/assets/css/style.css',
                array('google-fonts'), // Google Fonts読み込み後
                null
            );

            // ----------------------------------------------------------------------------------------------------
            // JS の読み込み
            // ----------------------------------------------------------------------------------------------------

            // gsap 
            wp_enqueue_script(
                'gsap',
                'https://cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js',
                array(),
                null,
                true // フッター出力
            );

            // gsap-scramble-text
            wp_enqueue_script(
                'gsap-scramble-text',
                'https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrambleTextPlugin.min.js',
                array('gsap'),
                null,
                true // フッター出力
            );

            // gsap-split-text
            wp_enqueue_script(
                'gsap-split-text',
                'https://cdn.jsdelivr.net/npm/gsap@3.15/dist/SplitText.min.js',
                array('gsap-scramble-text'),
                null,
                true // フッター出力
            );

            // main-js
            wp_enqueue_script(
                'main',
                get_template_directory_uri() . '/assets/js/main.js',
                array('gsap-split-text'), // 最後に読み込む
                null,  // バージョン番号（指定なしなら null）
                true   // フッターで出力
            );
        }

        add_action('wp_enqueue_scripts', 'my_theme_enqueue_assets');


        // ----------------------------------------------------------------------------------------------------
        // 'main-js' に type="module" 属性を付与する
        // ----------------------------------------------------------------------------------------------------

        function my_theme_script_loader_tag($attributes)
        {
            // 対象のハンドル名（'main-js'）に対して type="module" を設定
            if (isset($attributes['id']) && $attributes['id'] === 'main-js-js') {
                $attributes['type'] = 'module';
            }
            return $attributes;
        }
        add_filter('wp_script_attributes', 'my_theme_script_loader_tag');

        /**
         * gsap関連スクリプトに defer 属性を付与
         */
        function my_theme_add_defer_attribute($attributes)
        {
            // 自動生成されるID (splide-js-js, splide-autoscroll-js-js) を判定
            $target_ids = array('gsap-js', 'gsap-scramble-text-js', 'gsap-split-text-js');

            if (isset($attributes['id']) && in_array($attributes['id'], $target_ids, true)) {
                $attributes['defer'] = true;
            }
            return $attributes;
        }
        add_filter('wp_script_attributes', 'my_theme_add_defer_attribute');

        // ----------------------------------------------------------------------------------------------------
        // アイキャッチ画像を使用可能にする
        // ----------------------------------------------------------------------------------------------------
        add_theme_support('post-thumbnails');
