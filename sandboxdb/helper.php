<?php 
class helper { 
    function getIconByTypeFile($type,$filename) { 
        switch ($type) 
        {
		    case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
		        return "<a href=uploads/".$filename." target=_blank ><img src='images/word-16.png' height=16 width=16 /> ".$filename."</a>";
		        break;
		    case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet":
		    	return "<a href=uploads/".$filename." target=_blank ><img src='images/excel-16.png' height=16 width=16 /> ".$filename."</a>";
		        break;
		    case "image/jpeg":
		    	return "<a href=uploads/".$filename." target=_blank ><img src='images/jpg-16.png' height=16 width=16 /> ".$filename."</a>";
		        break;
	        case "text/plain":
	        	return "<a href=uploads/".$filename." target=_blank ><img src='images/text-plain-16.png' height=16 width=16 /> ".$filename."</a>";
	        break;
	         case "image/png":
	        	return "<a href=uploads/".$filename." target=_blank ><img src='images/png-16.png' height=16 width=16 /> ".$filename."</a>";
	        break;
	         case "application/pdf":
	        	return "<a href=uploads/".$filename." target=_blank ><img src='images/acrobat-16.png' height=16 width=16 /> ".$filename."</a>";
	        break;
	        default:
      			return "<a href=uploads/".$filename." target=_blank ><img src='images/file-16.png' height=16 width=16 /> ".$filename."</a>";
		}
    } 
} 
?> 