<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php $title = strval($language[$view->view]->title) ? $language[$view->view]->title : (isset($view->title) ? $view->title : 'Sfriendly.com'); ?>
<html ng-app="lynx" ng-controller="LayoutCtrl">
    <head >
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content='width=960, initial-scale=1, maximum-scale=1,user-scalabel=no' name='viewport'>
        <meta name="title" content="<?php echo $title ?>">
        <title>Sfriendly.com: <?php echo $title ?></title>
        <style>
            body{font-size: 15px;line-height: 1.5em;font-family: "Times New Roman", Georgia, Serif;}
            #header, #content, #footer{width: 600px;margin:0 auto;}
            #header{position: relative;}
            #content{text-align: justify;}
            #footer{font-size: 11px;color:grey;}
            hr{margin: 20px 0;}
            h1{text-align:center;line-height: 1em}
        </style>
    </head>
    <body>
        <div id="header">
            <a href="/" title="Sfriendly.com" >
                <img src="/images/Logo-head.fw.png" alt="Sfriendly logo"/>
            </a>
            <a style="position: absolute;bottom: 10px; right: 0;color:blue;" href="/" >&lt;&lt; Go to Home page</a>
            <hr/>
        </div>

        <div id="content" >
            <?php require_once APPPATH . 'views/' . $view->view . '.php'; ?>
        </div>
        <div id="footer">
            <hr/>
            Bản quyền @ 2014 Sfriendly.com / Sfriendly.vn - Được bảo vệ<br>
            Công ty TNHH Hoàng Quân - Trụ sở chính: 19/62 Trần Bình, Mai Dịch, Câu giấy Hà Nội<br>
            Giấy phép đăng kí kinh doanh số 0106519613 do Sở kế hoạch và Đầu tư Thành phố Hà Nội cấp lần đầu ngày 24/04/2014<br>
        </div>
    </body>
</html>
