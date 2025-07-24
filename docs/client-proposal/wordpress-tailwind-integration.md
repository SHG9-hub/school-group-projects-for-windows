# 🎨 WordPress × Tailwind CSS 連携技術ガイド

**対象**: やわらか動物病院 様  
**技術要件**: 現在の Tailwind デザインを WordPress で活用

---

## 📋 **現在の Tailwind 構成**

### **Laravel 側の Tailwind 設定**

```js
// tailwind.config.js（現在）
import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [forms],
};
```

### **使用中の Tailwind クラス例**

```html
<!-- 現在のwelcome.blade.phpから -->
<body class="font-sans antialiased bg-orange-50 text-gray-800">
    <nav class="bg-white shadow-sm border-b border-orange-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <h1 class="text-2xl font-bold text-orange-600">
                    やわらか動物病院
                </h1>
            </div>
        </div>
    </nav>
</body>
```

---

## 🚀 **WordPress で Tailwind を使う 3 つの方法**

### **方法 1: CDN 版（最も簡単）**

#### **functions.php に追加**

```php
<?php
function enqueue_tailwind_cdn() {
    wp_enqueue_script('tailwind-cdn', 'https://cdn.tailwindcss.com', array(), null, false);
}
add_action('wp_enqueue_scripts', 'enqueue_tailwind_cdn');

// Tailwindの設定をカスタマイズ
function tailwind_config() {
    echo '<script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        orange: {
                            50: "#fff7ed",
                            100: "#ffedd5",
                            600: "#ea580c",
                        }
                    },
                    fontFamily: {
                        sans: ["Noto Sans JP", "sans-serif"]
                    }
                }
            }
        }
    </script>';
}
add_action('wp_head', 'tailwind_config');
?>
```

**メリット**: 設定不要、即座に使える  
**デメリット**: ファイルサイズが大きい、カスタマイズ制限

---

### **方法 2: ビルド版（推奨）**

#### **WordPress テーマでの Tailwind 環境構築**

```bash
# テーマディレクトリで実行
cd wp-content/themes/yawaraka-theme/
npm init -y
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```

#### **tailwind.config.js（WordPress 用）**

```js
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./**/*.php", "./**/*.html", "./**/*.js", "./src/**/*.{html,js}"],
    theme: {
        extend: {
            colors: {
                // 現在のプロジェクトのカラーパレット
                primary: {
                    50: "#fff7ed",
                    100: "#ffedd5",
                    200: "#fed7aa",
                    300: "#fdba74",
                    400: "#fb8500",
                    500: "#f97316",
                    600: "#ea580c", // オレンジメイン
                    700: "#c2410c",
                    800: "#9a3412",
                    900: "#7c2d12",
                },
                hospital: {
                    orange: "#ea580c",
                    light: "#fff7ed",
                    accent: "#fb8500",
                },
            },
            fontFamily: {
                sans: ["Noto Sans JP", "sans-serif"],
                display: ["Noto Sans JP", "sans-serif"],
            },
            spacing: {
                72: "18rem",
                84: "21rem",
                96: "24rem",
            },
            borderRadius: {
                hospital: "0.75rem",
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
```

#### **src/styles.css**

```css
@tailwind base;
@tailwind components;
@tailwind utilities;

/* カスタムコンポーネント */
@layer components {
    .btn-primary {
        @apply bg-hospital-orange hover:bg-orange-700 text-white font-semibold py-3 px-6 rounded-hospital transition duration-200 ease-in-out shadow-md hover:shadow-lg;
    }

    .btn-secondary {
        @apply bg-white hover:bg-gray-50 text-hospital-orange border-2 border-hospital-orange font-semibold py-3 px-6 rounded-hospital transition duration-200;
    }

    .card-hospital {
        @apply bg-white rounded-hospital shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-200;
    }

    .nav-hospital {
        @apply bg-white shadow-sm border-b border-orange-100;
    }

    .text-hospital-primary {
        @apply text-hospital-orange font-semibold;
    }

    .bg-hospital-gradient {
        @apply bg-gradient-to-br from-hospital-light to-orange-100;
    }
}

/* WordPress固有のスタイル */
@layer base {
    /* WordPressの管理バー対応 */
    .admin-bar-offset {
        @apply pt-8;
    }

    /* WordPress画像の responsive対応 */
    .wp-caption {
        @apply max-w-full h-auto;
    }

    /* WordPress標準クラスのスタイリング */
    .aligncenter {
        @apply mx-auto block;
    }

    .alignleft {
        @apply float-left mr-4 mb-4;
    }

    .alignright {
        @apply float-right ml-4 mb-4;
    }
}
```

#### **package.json のスクリプト**

```json
{
    "scripts": {
        "build": "tailwindcss -i ./src/styles.css -o ./assets/css/style.css --watch",
        "build-prod": "tailwindcss -i ./src/styles.css -o ./assets/css/style.css --minify"
    }
}
```

#### **functions.php で CSS 読み込み**

```php
<?php
function enqueue_tailwind_styles() {
    wp_enqueue_style(
        'tailwind-styles',
        get_template_directory_uri() . '/assets/css/style.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/style.css')
    );
}
add_action('wp_enqueue_scripts', 'enqueue_tailwind_styles');
?>
```

---

### **方法 3: WordPress 専用プラグイン**

#### **Tailwind CSS WordPress Plugin 使用**

```php
// プラグインインストール後
add_theme_support('tailwind-css');

// カスタム設定
function custom_tailwind_config($config) {
    $config['theme']['extend']['colors']['hospital'] = array(
        'orange' => '#ea580c',
        'light' => '#fff7ed',
    );
    return $config;
}
add_filter('tailwind_config', 'custom_tailwind_config');
```

---

## 🔧 **実際の実装例**

### **WordPress テーマファイル例**

#### **header.php**

```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- Noto Sans JP フォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class('font-sans antialiased bg-hospital-light text-gray-800'); ?>>
    <?php wp_body_open(); ?>

    <!-- ナビゲーション（現在のデザインを踏襲） -->
    <nav class="nav-hospital">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="<?php echo home_url(); ?>" class="text-2xl font-bold text-hospital-orange">
                        <?php bloginfo('name'); ?>
                    </a>
                </div>

                <!-- メニュー -->
                <div class="hidden md:flex items-center space-x-8">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'flex space-x-8',
                        'container' => false,
                        'walker' => new Tailwind_Walker_Nav_Menu()
                    ));
                    ?>

                    <!-- 予約ボタン -->
                    <a href="<?php echo site_url('/booking/reservations/create'); ?>"
                       class="btn-primary">
                        予約はこちら
                    </a>
                </div>

                <!-- モバイルメニューボタン -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-600 hover:text-hospital-orange">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- モバイルメニュー -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'mobile',
                    'menu_class' => 'space-y-1',
                    'container' => false,
                    'walker' => new Tailwind_Mobile_Walker_Nav_Menu()
                ));
                ?>
            </div>
        </div>
    </nav>
```

#### **index.php（トップページ）**

```php
<?php get_header(); ?>

<main class="min-h-screen">
    <!-- ヒーローセクション -->
    <section class="bg-hospital-gradient py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-hospital-orange mb-6">
                大切な家族の健康を<br>やわらかくサポート
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                やわらか動物病院では、ペットとご家族が安心して過ごせるよう、
                温かい心で治療とケアを提供しています。
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo site_url('/booking/reservations/create'); ?>"
                   class="btn-primary text-lg px-8 py-4">
                    📅 今すぐ予約
                </a>
                <a href="<?php echo get_permalink(get_page_by_path('about')); ?>"
                   class="btn-secondary text-lg px-8 py-4">
                    🏥 病院について
                </a>
            </div>
        </div>
    </section>

    <!-- 特徴セクション -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
                やわらか動物病院の特徴
            </h2>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- 特徴1 -->
                <div class="card-hospital text-center">
                    <div class="text-4xl mb-4">🏥</div>
                    <h3 class="text-xl font-semibold text-hospital-primary mb-3">
                        充実した医療設備
                    </h3>
                    <p class="text-gray-600">
                        最新の診断機器と治療設備を完備し、
                        高品質な医療サービスを提供しています。
                    </p>
                </div>

                <!-- 特徴2 -->
                <div class="card-hospital text-center">
                    <div class="text-4xl mb-4">👨‍⚕️</div>
                    <h3 class="text-xl font-semibold text-hospital-primary mb-3">
                        専門医による診察
                    </h3>
                    <p class="text-gray-600">
                        経験豊富な獣医師が、ペット一匹一匹に
                        最適な治療プランを提供します。
                    </p>
                </div>

                <!-- 特徴3 -->
                <div class="card-hospital text-center">
                    <div class="text-4xl mb-4">💕</div>
                    <h3 class="text-xl font-semibold text-hospital-primary mb-3">
                        やわらかなケア
                    </h3>
                    <p class="text-gray-600">
                        ペットとご家族の気持ちに寄り添い、
                        温かく丁寧なケアを心がけています。
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 休診日お知らせ -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <?php echo do_shortcode('[upcoming_holidays]'); ?>
        </div>
    </section>

    <!-- 最新記事 -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
                最新のお知らせ
            </h2>

            <div class="grid md:grid-cols-3 gap-8">
                <?php
                $recent_posts = new WP_Query(array(
                    'posts_per_page' => 3,
                    'post_status' => 'publish'
                ));

                if ($recent_posts->have_posts()) :
                    while ($recent_posts->have_posts()) : $recent_posts->the_post();
                ?>
                <article class="card-hospital">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="mb-4">
                            <?php the_post_thumbnail('medium', array('class' => 'w-full h-48 object-cover rounded-hospital')); ?>
                        </div>
                    <?php endif; ?>

                    <h3 class="text-xl font-semibold mb-3">
                        <a href="<?php the_permalink(); ?>" class="text-hospital-primary hover:text-orange-700">
                            <?php the_title(); ?>
                        </a>
                    </h3>

                    <p class="text-gray-600 mb-4">
                        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                    </p>

                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <time datetime="<?php echo get_the_date('c'); ?>">
                            <?php echo get_the_date(); ?>
                        </time>
                        <a href="<?php the_permalink(); ?>" class="text-hospital-orange hover:underline">
                            続きを読む →
                        </a>
                    </div>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
```

#### **single.php（記事ページ）**

```php
<?php get_header(); ?>

<main class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php while (have_posts()) : the_post(); ?>
        <article class="bg-white rounded-hospital shadow-lg overflow-hidden">
            <!-- 記事ヘッダー -->
            <header class="p-8 border-b border-gray-200">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    <?php the_title(); ?>
                </h1>

                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                    <time datetime="<?php echo get_the_date('c'); ?>" class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <?php echo get_the_date(); ?>
                    </time>

                    <?php if (has_category()) : ?>
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            <?php the_category(', '); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </header>

            <!-- アイキャッチ画像 -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="px-8 pt-8">
                    <?php the_post_thumbnail('large', array('class' => 'w-full h-64 md:h-96 object-cover rounded-hospital')); ?>
                </div>
            <?php endif; ?>

            <!-- 記事内容 -->
            <div class="p-8 prose prose-lg max-w-none">
                <?php the_content(); ?>

                <!-- 予約への導線 -->
                <div class="mt-8 p-6 bg-hospital-gradient rounded-hospital">
                    <h3 class="text-xl font-semibold text-hospital-orange mb-3">
                        🏥 診察のご予約はこちら
                    </h3>
                    <p class="text-gray-700 mb-4">
                        お気軽にご相談ください。オンライン予約なら24時間いつでも受付中です。
                    </p>
                    <?php echo do_shortcode('[reservation_button text="今すぐ予約する"]'); ?>
                </div>
            </div>
        </article>
        <?php endwhile; ?>

        <!-- 関連記事 -->
        <section class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">関連記事</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <?php
                $related = new WP_Query(array(
                    'posts_per_page' => 2,
                    'post__not_in' => array($post->ID),
                    'category__in' => wp_get_post_categories($post->ID)
                ));

                if ($related->have_posts()) :
                    while ($related->have_posts()) : $related->the_post();
                ?>
                <article class="card-hospital">
                    <h3 class="text-lg font-semibold mb-2">
                        <a href="<?php the_permalink(); ?>" class="text-hospital-primary hover:text-orange-700">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <p class="text-gray-600 text-sm">
                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                    </p>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
```

---

## 🎯 **カスタム WordPress ナビゲーションウォーカー**

```php
<?php
// functions.php に追加

class Tailwind_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';

        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . ' class="text-gray-600 hover:text-hospital-orange px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

class Tailwind_Mobile_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // モバイル用のクラス設定
        $attributes = ! empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $item_output = '<a' . $attributes . ' class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-hospital-orange hover:bg-gray-50 rounded-md transition-colors duration-200">';
        $item_output .= apply_filters('the_title', $item->title, $item->ID);
        $item_output .= '</a>';

        $output .= $item_output;
    }
}
?>
```

---

## 📱 **JavaScript の追加（モバイルメニュー等）**

```js
// assets/js/theme.js
document.addEventListener("DOMContentLoaded", function () {
    // モバイルメニューの制御
    const mobileMenuButton = document.getElementById("mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener("click", function () {
            mobileMenu.classList.toggle("hidden");
        });
    }

    // スムーススクロール
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                target.scrollIntoView({
                    behavior: "smooth",
                });
            }
        });
    });

    // 休診日お知らせの自動取得
    async function fetchHolidays() {
        try {
            const response = await fetch("/wp-api/upcoming-holidays");
            const holidays = await response.json();
            updateHolidayDisplay(holidays);
        } catch (error) {
            console.error("休診日情報の取得に失敗しました:", error);
        }
    }

    function updateHolidayDisplay(holidays) {
        const holidayContainer = document.querySelector(".holiday-notice ul");
        if (holidayContainer && holidays.length > 0) {
            holidayContainer.innerHTML = holidays
                .map((holiday) => {
                    const date = new Date(
                        holiday.holiday_date
                    ).toLocaleDateString("ja-JP");
                    const desc = holiday.description
                        ? ` - ${holiday.description}`
                        : "";
                    return `<li>${date}${desc}</li>`;
                })
                .join("");
        }
    }

    // ページロード時に休診日情報を取得
    fetchHolidays();
});
```

---

## ✅ **実装のメリット**

### **1. デザインの統一性**

-   ✅ 現在の Laravel サイトと **完全に同じデザイン**
-   ✅ カラーパレット・フォント・レイアウトの統一
-   ✅ ユーザーに違和感のないスムーズな体験

### **2. 開発効率**

-   ✅ 既存の Tailwind クラスを **そのまま使用可能**
-   ✅ コンポーネント化によるメンテナンス性向上
-   ✅ レスポンシブ対応が自動的に継承

### **3. パフォーマンス**

-   ✅ PurgeCSS により **未使用スタイルを自動削除**
-   ✅ 最小限の CSS ファイルサイズ
-   ✅ 高速な表示速度

### **4. 保守性**

-   ✅ 設定ファイルでの **一元的なスタイル管理**
-   ✅ コンポーネントベースの再利用可能なコード
-   ✅ 将来的なデザイン変更への柔軟性

---

## 🚀 **実装手順**

### **Phase 1: 環境構築（2 日）**

1. WordPress テーマフォルダで Tailwind 環境構築
2. 現在のカラーパレット・設定を config に移植
3. ビルドプロセスの確立

### **Phase 2: 基本テーマ作成（3 日）**

1. header.php, footer.php の作成
2. index.php, single.php の実装
3. ナビゲーション・レスポンシブ対応

### **Phase 3: 統合・テスト（2 日）**

1. Laravel 予約システムとの連携確認
2. モバイル・各ブラウザでの動作確認
3. パフォーマンス最適化

---

## 💡 **まとめ**

現在の Tailwind 設定を WordPress に移植することで、**デザインの一貫性を保ちながら**WordPress の利便性を活用できます。

特に **方法 2（ビルド版）** を推奨します：

-   🎨 現在のデザインを完全再現
-   🚀 高いパフォーマンス
-   🔧 柔軟なカスタマイズ性
-   📱 完全なレスポンシブ対応

この実装により、顧客様は **見た目の変化を感じることなく**、WordPress の管理しやすさを享受できます。

---

**技術サポート**: 実装時の詳細な技術サポートも提供いたします  
**資料作成日**: 2025 年 1 月
