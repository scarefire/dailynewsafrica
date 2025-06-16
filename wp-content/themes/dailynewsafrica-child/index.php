<?php get_header(); ?>
<div class="container mt-4">
    <h1 class="mb-4">Daily News Africa</h1>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="mb-5">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_content(); ?>
        </article>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
