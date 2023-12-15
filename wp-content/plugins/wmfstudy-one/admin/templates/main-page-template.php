<div class="wrap">

  <?php
    $wfmStudyOnePostList = Wfmstudy_One_Admin::get_posts();
    $wfmStudyOneSlidesList = Wfmstudy_One_Admin::get_slides();

    $page = $_GET['paged'] ?? 1;

   /* print_r($wfmStudyOnePostList);*/
  ?>

  <h1><?php _e('Set Slide', WFM_STUDY_ONE);?></h1>

  <p><?php echo __('Number of articles', WFM_STUDY_ONE);?>: <?php echo $wfmStudyOnePostList->found_posts;?></p>

  <div class="pagination">
    <?php

      $big = 999999999;

      echo paginate_links(
          array(
	          'base'         => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
	          'format'       => '?page=%#%',
	          'total'        => $wfmStudyOnePostList->max_num_pages,
	          'current'      => max( 1, get_query_var('paged') ),
	          'show_all'     => False,
	          'end_size'     => 1,
	          'mid_size'     => 5,
	          'prev_next'    => True,
	          'prev_text'    => __('«'),
	          'next_text'    => __('»'),
          )
      );
    ?>
  </div>

  <table class="wp-list-table widefat fixed striped table-view-list posts">
    <thead>
      <tr>
        <th class="manage-column column-image column-primary" style="width: 50%;">
          <?php _e('Title', WFM_STUDY_ONE );?>
        </th>
        <th class="manage-column column-categories" style="width: 50%;">
		      <?php _e('Slide', WFM_STUDY_ONE );?>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
        if ( $wfmStudyOnePostList->have_posts() ): while ( $wfmStudyOnePostList->have_posts() ) : $wfmStudyOnePostList->the_post();
      ?>
          <?php
            $slideId = get_post_meta( get_the_ID(), 'wfmstudy_one', true);
          ?>
          <tr>
            <td class="title column-title has-row-actions column-primary page-title" data-colname="<?php _e('Title', WFM_STUDY_ONE );?>">
              <a href="<?php the_permalink();?>"><?php the_title();?></a>
              <button type="button" class="toggle-row">
                <span class="screen-reader-text">
                  <?php _e('Show more details', WFM_STUDY_ONE );?>
                </span>
              </button>
            </td>
            <td class="column_slides" data-colname="<?php _e('Slides', WFM_STUDY_ONE );?>">
              <select class="wfmstudy-one-select" data-postselect="<?php the_ID();?>">
                <option value="0" <?php selected( $slideId, '');?>>
                  <?php _e('Select a slide', WFM_STUDY_ONE );?>
                </option>
                <?php foreach( $wfmStudyOneSlidesList as $id => $title ):?>
                  <option value="<?php echo $id;?>" <?php selected( $slideId, $id);?>>
                    <?php echo $title;?>
                  </option>
                <?php endforeach;?>
              </select>
            </td>
          </tr>
      <?php endwhile; else:?>
          <p><?php _e('No entries found', WFM_STUDY_ONE);?></p>
    <?php endif;?>
    </tbody>
  </table>


</div>