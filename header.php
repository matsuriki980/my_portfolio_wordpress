        <!DOCTYPE html>
        <html lang="ja">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">


            <?php if (is_front_page()) : ?>

                <!-- ========================== フロントページの処理 ========================== -->
                <title>MATSUYAMA RIKIYA | ポートフォリオ</title>
                <meta property="og:type" content="website">
                <meta property="og:title" content="MATSUYAMA RIKIYA | ポートフォリオ">
                <meta property="og:url" content="https://matsuyamarikiya.jp/my_portfolio/">

            <?php else : ?>

                <!-- ========================== フロントページ以外の処理 ========================== -->

                <!-- 投稿タイトルを出力する -->
                <title><?php echo esc_html(get_the_title(get_queried_object_id())); ?> | ポートフォリオ</title>
                <meta property="og:title" content="<?php echo esc_html(get_the_title(get_queried_object_id())); ?> | ポートフォリオ">

                <!-- ページURLを取得して出力する -->
                <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">

                <!-- top以外はarticleを設定する -->
                <meta property="og:type" content="article">

            <?php endif; ?>
            <meta property="og:description" content="未経験からWebコーダーを目指す松山里貴弥のポートフォリオサイトです。これまでに制作したWebサイトや、学習中のスキルなどを紹介しています。">
            <meta property="og:site_name" content="松山里貴弥のポートフォリオ">

            <?php wp_head(); ?>
        </head>

        <body
            <?php body_class(); ?>>