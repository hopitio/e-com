<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=320; initial-scale=1; maximum-scale=1; minimum-scale=1 user-scalable=no" />
        <title><?php echo $language[$view->view]->title;?></title>
        <script src="js/jquery-1.11.0.min.js"></script>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        
        <!-- perfect srollbar -->
        <script src="js/perfect-scrollbar.with-mousewheel.min.js"></script>
        <link href="style/perfect-scrollbar.min.css" rel="stylesheet" />
        
        <!-- bxSlider-->
        <script src="js/jquery.bxslider.js"></script>
        <link href="style/jquery.bxslider.css" rel="stylesheet" />
        
        <!-- Jquery UI -->
        <script src="js/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js"></script>
        <link rel="stylesheet" type="text/css" href="js/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css" media="all">
        
        <!-- Css -->
        <link rel="stylesheet" type="text/css" href="style/main.css" media="all">
        
        
    </head>
    <body>
        <div id="wrap">
            <?php require_once APPPATH.'views/'.$view->view.'.php';?>
        </div>
    </body>
</html>