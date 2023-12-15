<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
  <label for="s">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
      <g clip-path="url(#clip0_16_20725)">
        <path d="M18.4592 19.898C18.8498 20.2886 19.4829 20.2886 19.8734 19.898C20.264 19.5075 20.264 18.8744 19.8734 18.4838L18.4592 19.898ZM14.931 8.40662C14.931 12.0235 11.999 14.9556 8.38203 14.9556V16.9556C13.1035 16.9556 16.931 13.1281 16.931 8.40662H14.931ZM8.38203 14.9556C4.7651 14.9556 1.83301 12.0235 1.83301 8.40662H-0.166992C-0.166992 13.1281 3.66053 16.9556 8.38203 16.9556V14.9556ZM1.83301 8.40662C1.83301 4.7897 4.7651 1.8576 8.38203 1.8576V-0.142395C3.66053 -0.142395 -0.166992 3.68513 -0.166992 8.40662H1.83301ZM8.38203 1.8576C11.999 1.8576 14.931 4.7897 14.931 8.40662H16.931C16.931 3.68513 13.1035 -0.142395 8.38203 -0.142395V1.8576ZM13.0671 14.5059L18.4592 19.898L19.8734 18.4838L14.4813 13.0917L13.0671 14.5059Z" fill="#FFF6EB"/>
      </g>
      <defs>
        <clipPath id="clip0_16_20725">
          <rect width="20" height="20" fill="white" transform="translate(0 0.024292)"/>
        </clipPath>
      </defs>
    </svg>
  </label>
	<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Search someting here..." />
  <button type="submit" id="searchsubmit">Search</button>

</form>