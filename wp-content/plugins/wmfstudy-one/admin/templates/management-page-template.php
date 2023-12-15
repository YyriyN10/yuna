
<div class="wrap">
	<h1><?php _e('Slides Management', WFM_STUDY_ONE);?></h1>

  <h3><?php _e('Add Slide', WFM_STUDY_ONE);?></h3>

  <form action="<?php echo admin_url('admin-post.php');?>" method="post">

    <?php wp_nonce_field('wfmstudy_one_action','wfmstudy_one_add_slide');?>

    <?php
      $errors = get_transient('wfmstudy_one_error');
      $success = get_transient('wfmstudy_one_success');

      if ( !empty($errors) ):
    ?>
        <div id="setting-error-settings_updated" class="notice notice-error settings-error is-dismissible">
          <p><strong><?php echo $errors;?></strong></p>
        </div>

        <?php delete_transient('wfmstudy_one_error'); ?>
    <?php endif;?>

    <?php if ( !empty($success) ):?>

      <div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible">
        <p><strong><?php echo $success;?></strong></p>
      </div>
	    <?php delete_transient('wfmstudy_one_success'); ?>
    <?php endif;?>


    <input type="hidden" name="action" value="save_slide">

    <table class="form-table">
      <tbody>
        <tr>
          <th>
            <label for="slide_title">
              <?php _e('Slide Title', WFM_STUDY_ONE);?>
            </label>
          </th>
          <td>
            <input type="text" class="regular-text" name="slide_title" id="slide_title" required>
          </td>
        </tr>
        <tr>
          <th>
            <label for="slide_content">
			        <?php _e('Slide Content', WFM_STUDY_ONE);?>
            </label>
          </th>
          <td>
            <textarea type="text" class="large-text code" rows="10" cols="50" name="slide_content" id="slide_content" required></textarea>
          </td>
        </tr>
      </tbody>
    </table>
    <p class="submit">
      <button class="button button-primary" type="submit">
        <?php _e('Save slide', WFM_STUDY_ONE);?>
      </button>
    </p>
  </form>

  <hr>

  <h3><?php _e('Edit Slide', WFM_STUDY_ONE);?></h3>

  <?php
    $wfmstudyOneSlides = Wfmstudy_One_Admin::get_slides(true);

    if ( $wfmstudyOneSlides ):
  ?>

  <div id="accordion">


    <?php foreach( $wfmstudyOneSlides as $item ):?>
      <h3><?php echo $item['title'];?></h3>
      <div>
        <form action="<?php echo admin_url('admin-post.php');?>" method="post">
	        <?php wp_nonce_field('wfmstudy_one_action','wfmstudy_one_add_slide');?>

          <input type="hidden" name="action" value="save_slide">
          <input type="hidden" name="slide_id" value="<?php echo $item['id']?>">

          <table class="form-table">
            <tbody>
            <tr>
              <th>
                <label for="slide_title_<?php echo $item['id']?>">
					        <?php _e('Slide Title', WFM_STUDY_ONE);?>
                </label>
              </th>
              <td>
                <input type="text" class="regular-text" name="slide_title" id="slide_title_<?php echo $item['id']?>" required value="<?php echo esc_attr($item['title']);?>">
              </td>
            </tr>
            <tr>
              <th>
                <label for="slide_content_<?php echo $item['id']?>">
					        <?php _e('Slide Content', WFM_STUDY_ONE);?>
                </label>
              </th>
              <td>
                <textarea type="text" class="large-text code" rows="10" cols="50" name="slide_content" id="slide_content_<?php echo $item['id']?>" required ><?php echo esc_html( $item['content'] );?></textarea>
              </td>
            </tr>
            </tbody>
          </table>
          <p class="submit">
            <button class="button button-primary" type="submit">
			        <?php _e('Save slide', WFM_STUDY_ONE);?>
            </button>
          </p>
        </form>
      </div>
    <?php endforeach;?>

  </div>
  <?php endif;?>

</div>
