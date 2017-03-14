<?php 
//Function fills main panel
	function mainPanel($page_id) {
    switch($page_id) {
      case '': //When it is null
      case 'home':
        
        break;
      case 'courses':
        
        break;
      case 'contact':
       
    		break;
      default: //Default, ie when the page_id does not match with predefined cases
        echo '<p class="red">The page was not found. Showing Home page instead</p>';
        session_destroy();
    }
	}
?>