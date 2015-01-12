<form id="order-mockup-frm" action="/portal/order_verifing/portal_get_information" method="post">
    <input id="post-data" name="order" type="hidden" value="">
</form>
<script type="text/javascript">
var postData = {"secretKey":null,"orderkey":"8d6ef647c7d5a8791ffb93bc5c709f7e","su":"GIFT","user":{"is_authorized":true,"languageKey":"VN-VI","currencyKey":"USD","id":"5","full_name":"AN ","account":"lethanhan.bkaptech@gmail.com","sex":"M","DOB":"2014-09-28 12:09:11","date_joined":"2014-04-29 10:04:54","status":"1","last_active":"2014-04-29 10:04:54","platform_key":"0","user_type":"ADMIN","secretKey":null,"portal_id":"50","sub_id":"5","phone":"09160023051","fullname":"AN "},"products":[{"id":"26","name":"Th\u1ecbt th\u0103n x\u00f4ng kh\u00f3i, n\u1ea5m t\u01b0\u01a1i & pho m\u00e1t mozzarella ( prosciuitto e funghi ) Th\u1ecbt th\u0103n x\u00f4ng kh\u00f3i, n\u1ea5m t\u01b0\u01a1i & pho m\u00e1t mozzarella ( prosciuitto e funghi ) Th\u1ecbt th\u0103n x\u00f4ng kh\u00f3i, n\u1ea5m t\u01b0\u01a1i & pho m\u00e1t mozzarella ( prosciuitto e funghi )","image":"\/thumbnail.php\/\/2014\/10\/04\/593c9fbc596609aaabe14d9c54dcb7f3.jpg","shortDesc":"sdfsdfdsfsdfsdf\r\n","price":800000,"quantity":1,"totalPrice":800000,"actualPrice":800000,"sellerName":"Samsung","sellerEmail":"admin@samsung.com","sid":"samsung","shipping":"standard"},{"id":"27","name":"shit","image":"\/thumbnail.php\/\/uploads\/2014\/07\/26\/2ac73dcd2861aed13372f036c9c558fd.jpg","shortDesc":"","price":10000,"quantity":2,"totalPrice":20000,"actualPrice":20000,"sellerName":"Samsung","sellerEmail":"admin@samsung.com","sid":"samsung","shipping":"standard"}],"shipping":[{"shippingKey":"standard-projecte","shippingDisplayName":"Chuy\u1ec3n ti\u1ebft ki\u1ec7m (2-5 ng\u00e0y)","shippingPrice":105000,"estimateDateMin":"2015-01-06 19:45","estimateDateMax":"2015-01-09 19:45"}],"addresses":{"shipping":{"fullname":"123123","telephone":"122341234","streetAddress":"122341234","stateProvince":["101","Ha Noi"],"language":"13412341234"}}};

    $(document).ready(function(){
        $('#post-data').val(JSON.stringify(postData));
        $('#order-mockup-frm').submit();
    });
    

</script>