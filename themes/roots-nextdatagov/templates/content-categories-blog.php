<div class="single">
<div class="container">
<?php
$category = get_the_category();
$term_name = $category[0]->cat_name;
$term_slug = $category[0]->slug;
?>
<?php
$cat_name = $category[0]->cat_name;
$cat_slug = $category[0]->slug;
?>


            <?php
            global $cat_name;
            $category = get_the_category(  );
            $cat_name=$category[0]->cat_name;


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('posts_per_page' => 6, 'paged' => $paged, 'category_name'=> $cat_name  );
$apps = new WP_Query( $args );
		$my_post_count = $apps->post_count;

          
            ?><div class="catimg"  style="padding-top:30px;padding-bottom:10px; ">
			<span id="imagecat"  style="margin-left:10px;margin-bottom:-10px;" class="<?php foreach( get_the_category() as $cat ) { echo $cat->slug . '  '; } ?>">&nbsp;</span> 
			<span style="margin-left:20px;font-size:25px;text-transform:uppercase;color:#808080;line-height:40%;vertical-align:bottom;"><?php echo $cat_name; ?></span></div>
			      <div  class="horizontal_dotted_line"></div>
				  <br>
            <?php
			
			 if ($apps->have_posts()) : ?>
            <?php while ($apps->have_posts()) : $apps->the_post(); ?>

                <?php if( false == get_post_format() ){ ?>
                    <div id="cat-posts" class="single-cat-post ">



                        <!-- Content - Blog Post -->
                        <div class="category-wrapper">
                  
                            <div class="new-cat-post" id="post-<?php the_ID(); ?>">

                              
                                    <div class=" title  "><?php the_title(); ?></div>
									<div style="color:#808080; font-size:16px;margin-left:2px;  "><span style="text-transform:uppercase"><?php $author = get_the_author(); echo $author;?></span>&nbsp;// <?php the_time('M jS Y ') ?> </div>
									<br/>
                                    <div class="body">
                                        <?php
                                        $words = explode(" ",strip_tags(get_the_content()));
                                        $content = implode(" ",array_splice($words,0,50));
                                        echo $content;
                                        ?>
										<br>
                                        <a href="<?php echo get_permalink(); ?>" style="font-weight:bold;float:right;text-transform:uppercase" class="<?php foreach( get_the_category() as $cat ) { echo $cat->slug . '  '; } ?> ">Read More</a>
                                    </div>
                          
                              
                             
                      

                            </div>
                        </div>
						 </div> <!-- posts -->
						      <div  class="horizontal_dotted_line"></div>
							  <br>
                    <?php } ?>

                <?php endwhile; ?>

<nav class="post-nav">
<?php your_pagination($apps) ;?>  
</nav>

   
        <br clear="all" />
            <?php else : ?>
            <h2 class="center">Not Found</h2>
            <p class="center">Sorry, but you are looking for something that isn't here.</p>

            <?php endif; ?>


   
   
  

</div>
</div>
