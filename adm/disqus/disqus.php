<?php require_once("../includes/config.php");
		require_once("../includes/verifica.php"); $senha = 'marcos123' ; ?>
<form id="disqus" action="https://disqus.com/profile/login/?next=http://disqus.com/admin/moderate/#/all" method="post" target="disqus" accept-charset="utf-8">
  <input type="hidden" name="username"  value="palmaresfest" tabindex="20" />
  <input type="hidden" name="password" value="<?php echo $senha; ?>" tabindex="21" />
</form>
<script>
document.getElementById('disqus').submit();
</script>
