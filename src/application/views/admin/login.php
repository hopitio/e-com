    1<form id="frmLogin" method="post">
<?php if(isset($error)){
    echo $error;
}?><br/>
username <input name='username' type="text"/> <br/>
password <input name='password' type="password" /><br/>
<button id="buttonLogin" onClick="loginClick()"> LOGIN </button>
</form>

<script type="text/javascript">
function loginClick(){
    $('#frmLogin').submit();
}

</script>