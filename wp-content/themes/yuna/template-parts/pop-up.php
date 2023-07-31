<?php
	$thxModalContent = carbon_get_theme_option('yuna_thx_popup_text'.carbon_lang_prefix());

	$inputName = carbon_get_theme_option( 'yuna_form_input_name' );
	$inputPhone = carbon_get_theme_option( 'yuna_form_input_email' );
	$inputEmail = carbon_get_theme_option( 'yuna_form_input_phone' );
	$inputMassage = carbon_get_theme_option( 'yuna_form_input_message');
	$inputErrorText = carbon_get_theme_option('yuna_form_input_error_text'.carbon_lang_prefix());

	$addPhoneMask = carbon_get_theme_option('yuna_form_phone_mask');
	$phoneMaskType = '';
	$customMask = '';

	if ( $addPhoneMask == 'yes' ){
		$phoneMaskType = carbon_get_theme_option('yuna_form_phone_mask_type');
		$customMask = carbon_get_theme_option('yuna_form_phone_custom_mask');
	}

	if ( $thxModalContent ):
?>

	<!-- The Modal -->
<div class="modal thx-modal" id="thxModal">
  <div class="modal-dialog">
    <div class="modal-content yuna-radius">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.878px" height="122.88px" viewBox="0 0 122.878 122.88" enable-background="new 0 0 122.878 122.88" xml:space="preserve"><g><path d="M1.426,8.313c-1.901-1.901-1.901-4.984,0-6.886c1.901-1.902,4.984-1.902,6.886,0l53.127,53.127l53.127-53.127 c1.901-1.902,4.984-1.902,6.887,0c1.901,1.901,1.901,4.985,0,6.886L68.324,61.439l53.128,53.128c1.901,1.901,1.901,4.984,0,6.886 c-1.902,1.902-4.985,1.902-6.887,0L61.438,68.326L8.312,121.453c-1.901,1.902-4.984,1.902-6.886,0 c-1.901-1.901-1.901-4.984,0-6.886l53.127-53.128L1.426,8.313L1.426,8.313z"/></g>
          </svg>
        </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
	      <?php echo wp_kses_post($thxModalContent);?>
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.88px" height="122.88px" viewBox="0 0 122.88 122.88" enable-background="new 0 0 122.88 122.88" xml:space="preserve"><g><path d="M34.465,67.43c-1.461-1.322-1.574-3.579-0.252-5.041c1.322-1.461,3.58-1.574,5.041-0.252l13.081,11.862l31.088-32.56 c1.361-1.431,3.625-1.487,5.056-0.126c1.431,1.361,1.487,3.624,0.126,5.055L55.11,81.447l-0.005-0.004 c-1.33,1.398-3.541,1.489-4.98,0.187L34.465,67.43L34.465,67.43z M8.792,0h105.296c2.422,0,4.62,0.988,6.212,2.58 s2.58,3.791,2.58,6.212v105.295c0,2.422-0.988,4.62-2.58,6.212s-3.79,2.58-6.212,2.58H8.792c-2.421,0-4.62-0.988-6.212-2.58 S0,116.51,0,114.088V8.792C0,6.371,0.988,4.172,2.58,2.58S6.371,0,8.792,0L8.792,0z M114.088,7.17H8.792 c-0.442,0-0.847,0.184-1.143,0.479C7.354,7.945,7.17,8.35,7.17,8.792v105.295c0,0.442,0.184,0.848,0.479,1.144 c0.296,0.296,0.701,0.479,1.143,0.479h105.296c0.442,0,0.848-0.184,1.144-0.479c0.295-0.296,0.479-0.701,0.479-1.144V8.792 c0-0.443-0.185-0.848-0.479-1.143C114.936,7.354,114.53,7.17,114.088,7.17L114.088,7.17z"/></g>
        </svg>
      </div>

    </div>
  </div>
</div>
<?php endif;?>

<!-- The Modal -->
<div class="modal form-modal" id="formModal">
  <div class="modal-dialog">
    <div class="modal-content yuna-radius">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="form-title subtitle"></h4>
        <button type="button" class="close" data-dismiss="modal">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.878px" height="122.88px" viewBox="0 0 122.878 122.88" enable-background="new 0 0 122.878 122.88" xml:space="preserve"><g><path d="M1.426,8.313c-1.901-1.901-1.901-4.984,0-6.886c1.901-1.902,4.984-1.902,6.886,0l53.127,53.127l53.127-53.127 c1.901-1.902,4.984-1.902,6.887,0c1.901,1.901,1.901,4.985,0,6.886L68.324,61.439l53.128,53.128c1.901,1.901,1.901,4.984,0,6.886 c-1.902,1.902-4.985,1.902-6.887,0L61.438,68.326L8.312,121.453c-1.901,1.902-4.984,1.902-6.886,0 c-1.901-1.901-1.901-4.984,0-6.886l53.127-53.128L1.426,8.313L1.426,8.313z"/></g>
          </svg>
        </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post"  class="form-communication text-center">
          <input type="hidden" name="action" value="yuna_form_integration">
		      <?php if( $inputName == 'yes'):?>
            <div class="form-group name-field">
              <input type="text" name="name" class="form-control" placeholder="" required>
              <p class="error-text"><?php echo esc_html($inputErrorText);?></p>
            </div>
		      <?php endif;?>
		      <?php if( $inputPhone == 'yes'):?>
            <div class="form-group phone-field">
              <input type="tel"
                     name="phone"
                     data-custommask="<?php echo $customMask;?>"
                     class="form-control<?php if( $phoneMaskType == 'ipmask' ):?> ip-multi-mask<?php elseif ($phoneMaskType == 'custom'):?> custom-mask<?php endif;?>"
                     placeholder=""
                     required>
              <p class="error-text"><?php echo esc_html($inputErrorText);?></p>
            </div>
		      <?php endif;?>
		      <?php if( $inputEmail == 'yes'):?>
            <div class="email-field form-group">
              <input type="email" name="email" class="form-control" placeholder="" required>
              <p class="error-text"><?php echo esc_html($inputErrorText);?></p>
            </div>
		      <?php endif;?>
		      <?php if( $inputMassage == 'yes'):?>
            <div class="form-group textarea-group">
              <textarea name="massage" class="form-control" placeholder=""></textarea>
            </div>
		      <?php endif;?>
          <button type="submit" class="button"></button>
          <input type="hidden" name="form-lang" value="">
          <input type="hidden" name="home-url" value="<?php echo home_url( '/' ); ?>">
          <input type="hidden" name="form-name" value="">

        </form>

      </div>

    </div>
  </div>
</div>
