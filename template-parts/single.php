<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

while (have_posts()) :
	the_post();
?>

<main id="content" <?php post_class('site-main'); ?>>

	<!-- ШАГ 2 Пункт 2: Миниатюра выше всего -->
    <div class="post-thumbnail">
        <?php 
            // Проверяем наличие миниатюры у поста
            if (has_post_thumbnail()) { 
                the_post_thumbnail('large');
            }
        ?>
    </div>
    
    <!-- Заголовок статьи -->
    <<?php echo is_single() ? 'header' : ''; ?> class="page-header">
        
        <!-- ШАГ 2 Пункт 3: Центрирование заголовка через CSS -->
        <<?php echo is_single() ? 'h1' : 'h2'; ?> style="text-align:center;" class="entry-title"><?php the_title(); ?></<?php echo is_single() ? 'h1' : 'h2'; ?>>
    </header>

    <!-- Основной контент статьи -->
    <div class="page-content">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>

        <!-- ТЕГИ СТАТЬИ (самый нижний блок) -->
        <?php if ( has_tag() ) : ?>
			<div class="post-tags">
				<?php the_tags('<span class="tag-links">' . esc_html__( 'Tagged ', 'hello-elementor' ), ', ', '</span>' ); ?>
                
                <!-- ШАГ 2 Пункт 4: Добавляем Аватар автора РОВНО ПОСЛЕ БЛОКА С ДАТОЙ И АВТОРОМ -->
                <div class="author-meta">
                    <span class="avatar"><?= get_avatar(get_the_author_meta('user_email'), 60); ?></span>
                    <?= esc_html__('Опубликовано:', 'hello-elementor') ?> <?= get_the_date() ?> | Автор: <?= the_author_posts_link(); ?>
                </div>

			</div>
		<?php endif; ?>
    </div>

	<!-- Комментарии -->
	<?php comments_template(); ?>

</main>

<?php endwhile;
