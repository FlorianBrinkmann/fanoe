<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'fanoe' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <div class="entry-meta">
            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'fanoe' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_time('j. F Y \@ H:i \U\h\r'); ?></a>
        </div><!-- .entry-meta -->
        
        <div class="comments-trackbacks">
            <a href="<?php the_permalink(); ?>#comments-title"><?php comment_count(); ?></a>
            <a href="<?php the_permalink(); ?>#trackbacks-title"><?php trackback_count(); ?></a>
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'fanoe' ) ); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'fanoe' ) . '</span>', 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->

    <footer class="entry-meta">
        <div class="entry-meta">
            <?php
			printf( __( '<a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s" rel="author">%6$s</a></span></span>', 'fanoe' ),
				esc_url( get_permalink() ),
				get_the_date( 'c' ),
				get_the_date(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'fanoe' ), get_the_author() ) ),
				get_the_author()
			);
            ?>
        </div><!-- .entry-meta -->
        
        <div class="entry-meta">
            <?php $show_sep = false; ?>
        	<?php
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( __( ', ', 'fanoe' ) );
            if ( $categories_list ):
        	?>
        		<span class="cat-links">
            		<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'fanoe' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
            		$show_sep = true; ?>
        		</span>
        	<?php endif; // End if categories ?>
        	<?php
            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', __( ', ', 'fanoe' ) );
            if ( $tags_list ):
            	if ( $show_sep ) : ?>
        			<span class="sep"> | </span>
            	<?php endif; // End if $show_sep ?>
        		<span class="tag-links">
            		<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'fanoe' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
            		$show_sep = true; ?>
        		</span>
        	<?php endif; // End if $tags_list ?>
        </div><!-- .entry-meta -->
        <?php edit_post_link( __( 'Edit', 'fanoe' ), '<span class="edit-link">', '</span>' ); ?>
		<?php $fanoe_option = fanoe_get_global_options(); if($fanoe_option['fanoe_social_blog'] =='0'){}else{ ?>
            <ul class="social">
                <li><a class="icon-google-plus" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;title=<?php echo rawurlencode(strip_tags(get_the_title())) ?>" target="blank" title="Teilen Sie '<?php the_title(); ?>' bei Google +"></a></li>
                <li><a class="icon-twitter" href="https://twitter.com/intent/tweet?source=webclient&amp;text=<?php echo rawurlencode(strip_tags(get_the_title())) ?>%20<?php echo urlencode(get_permalink($post->ID)); ?>" target="blank" title="Teilen Sie '<?php the_title(); ?>' auf Twitter"></a></li>
                <li><a class="icon-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;t=<?php echo rawurlencode(strip_tags(get_the_title())) ?>" target="blank" title="Teilen Sie '<?php the_title(); ?>' bei Facebook"></a></li>
            </ul>
		<?php }?>
    </footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
