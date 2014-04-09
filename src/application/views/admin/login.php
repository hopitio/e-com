<form method="post">
<?php if(isset($error)){
    echo $error;
}?><br/>
username <input name='username' type="text"/> <br/>
password <input name='password' type="password" /><br/>
<button> LOGIN </button>
</form>