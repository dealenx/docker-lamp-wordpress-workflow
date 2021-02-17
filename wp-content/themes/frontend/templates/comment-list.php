<?php 
$args = array(
	'reverse_top_level' => false,
	'author_email'        => '',
	'author__in'          => '',
	'author__not_in'      => '',
	'include_unapproved'  => '',
	'fields'              => '',
	'comment__in'         => '',
	'comment__not_in'     => '',
	'karma'               => '',
	'number'              => '',
	'offset'              => '',
	'no_found_rows'       => true,
	'orderby'=>'comment_date',
	'order'               => 'ASC',
	'parent'              => '',
	'post_author__in'     => '',
	'post_author__not_in' => '',
	'post_id'             => $post->ID,
	'post__in'            => '',
	'post__not_in'        => '',
	'post_author'         => '',
	'post_name'           => '',
	'post_parent'         => '',
	'post_status'         => '',
	'post_type' => 'post',
	'status'              => 'all',
	'type'                => '',
	'type__in'            => '',
	'type__not_in'        => '',
	'user_id'             => '',
	'search'              => '',
	'count'               => false,
	'meta_key'            => '',
	'meta_value'          => '',
	'meta_query'          => '',
	'date_query'          => null, // See WP_Date_Query
	'hierarchical'        => false,
	'update_comment_meta_cache'  => true,
	'update_comment_post_cache'  => false,
);
$comments = get_comments( $args ); ?>

<div class="comment-list container">

		<?php foreach( $comments as $comment ): ?>
			<div class="comment-list-block">
				<h4><?php echo $comment->comment_author; ?></h4>
				<p>
				<?php echo $comment->comment_content; ?>
				</p>
				<a class="comment-list-block__anchor" name="comment-<?php echo $comment->comment_ID; ?>"></a>
				<div class="comment-list-block__datatime">
					<data><?php echo comment_date( 'd.m.Y' ); ?></data>
					<time><?php comment_time( 'H:i' ); ?></time>
					
				</div>
				
			</div>
		<?php endforeach; ?>
		
		<?php if(count($comments) === 0): ?>
		<p style="margin-bottom: 16px;">
			Комментарии отсутсвуют 
		</p>
		<?php endif; ?>
</div>