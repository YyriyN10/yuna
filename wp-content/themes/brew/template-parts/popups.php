
<!-- The F.A.Q. Modal -->
<div class="modal faq-modal" id="myFaqModal">
	<div class="modal-dialog">

		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h2 class="block-title white-title text-center"></h2>
        <button type="button" class="close" data-dismiss="modal">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.878px" height="122.88px" viewBox="0 0 122.878 122.88" enable-background="new 0 0 122.878 122.88" xml:space="preserve"><g><path d="M1.426,8.313c-1.901-1.901-1.901-4.984,0-6.886c1.901-1.902,4.984-1.902,6.886,0l53.127,53.127l53.127-53.127 c1.901-1.902,4.984-1.902,6.887,0c1.901,1.901,1.901,4.985,0,6.886L68.324,61.439l53.128,53.128c1.901,1.901,1.901,4.984,0,6.886 c-1.902,1.902-4.985,1.902-6.887,0L61.438,68.326L8.312,121.453c-1.901,1.902-4.984,1.902-6.886,0 c-1.901-1.901-1.901-4.984,0-6.886l53.127-53.128L1.426,8.313L1.426,8.313z"/></g></svg>
        </button>
			</div>

			<!-- Modal body -->
			<div class="modal-body" >

			</div>


		</div>
	</div>
</div>

<!-- The Order Modal -->
<div class="modal order-modal" id="myOrderModal">
  <div class="modal-dialog">

    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h2 class="block-title white-title text-center">Order</h2>
        <button type="button" class="close" data-dismiss="modal">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.878px" height="122.88px" viewBox="0 0 122.878 122.88" enable-background="new 0 0 122.878 122.88" xml:space="preserve"><g><path d="M1.426,8.313c-1.901-1.901-1.901-4.984,0-6.886c1.901-1.902,4.984-1.902,6.886,0l53.127,53.127l53.127-53.127 c1.901-1.902,4.984-1.902,6.887,0c1.901,1.901,1.901,4.985,0,6.886L68.324,61.439l53.128,53.128c1.901,1.901,1.901,4.984,0,6.886 c-1.902,1.902-4.985,1.902-6.887,0L61.438,68.326L8.312,121.453c-1.901,1.902-4.984,1.902-6.886,0 c-1.901-1.901-1.901-4.984,0-6.886l53.127-53.128L1.426,8.313L1.426,8.313z"/></g></svg>
        </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
        <form method="post" action="/action_page.php">
          <h3 class="order-subtitle">Personal data</h3>
          <div class="contact-fields">
            <div class="form-group">
              <input name="name" type="text" class="form-control" placeholder="Full Name">
            </div>
            <div class="form-group">
              <input name="email" type="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <input name="phone" type="tel" class="form-control" placeholder="Phone">
            </div>
          </div>

          <div class="form-group textarea-group">
            <textarea name="message" class="form-control" placeholder="Message"></textarea>
          </div>

          <div class="delivery-method">
            <h3 class="order-subtitle">Delivery method</h3>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="delivery-method" value="np">
                <p class="label-text">Nova Poshta</p>
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" checked class="form-check-input" name="delivery-method" value="sp">
                <p class="label-text">Self pickup</p>
              </label>
            </div>
          </div>
          <div class="delivery d-none">
            <h3 class="order-subtitle">Delivery data</h3>
            <div class="form-group item-list-wrapper" id="delivery-region">
              <select class="form-control" name="delivery-region">
                <option value="">Region</option>
              </select>
              <!--<p class="current" data-region-ref="">
                <span class="text">Region </span>
                <span class="arrow">
                  <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="512" height="298" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 298.04">
                    <path fill-rule="nonzero" d="M12.08 70.78c-16.17-16.24-16.09-42.54.15-58.7 16.25-16.17 42.54-16.09 58.71.15L256 197.76 441.06 12.23c16.17-16.24 42.46-16.32 58.71-.15 16.24 16.16 16.32 42.46.15 58.7L285.27 285.96c-16.24 16.17-42.54 16.09-58.7-.15L12.08 70.78z"/>
                  </svg>
                </span>

              </p>
              <ul class="item-list">
              </ul>-->
            </div>
            <div class="form-group" id="delivery-area">
              <select class="form-control" name="delivery-area">
                <option  value="">Area</option>
              </select>
            </div>
            <div class="form-group" id="delivery-city">
              <select class="form-control" name="delivery-city">
                <option  value="">City</option>
              </select>
            </div>
            <div class="form-group" id="delivery-address">
              <select class="form-control" name="delivery-address">
                <option  value="">Address</option>
              </select>
            </div>
          </div>
          <h3 class="order-subtitle">Order data</h3>
          <ul class="order-list">

          </ul>
          <p class="total-sum">Total price: <span><span class="currency">$</span><span class="amount">100</span></span></p>
          <div class="payment-method-wrapper">
            <h3 class="order-subtitle">Payment method</h3>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="payment-method" value="cash">
                <p class="label-text">In cash</p>
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="payment-method" value="non-cash">
                <p class="label-text">Non-cash transfer</p>
              </label>
            </div>
          </div>
          <input type="hidden" name="amount" value="">
          <button type="submit" class="button brown">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>