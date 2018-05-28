<div class="panel panel-default">
	<div class="panel-body">
		<h4 style="margin:0!important; color: #07445d; font-size: 17px; font-family: century gothic;">
			<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;<b><?php echo $test["konu_adi"]." - ".$test["test_adi"]; ?></b>
		</h4>
		<a class="btn btn-primary btn-sm" href="index.php?git=sorular&id=<?php echo $test['test_id']; ?>" role="button" style="display:inline-block; margin-top:15px;">Teste Git</a>
		<h4 class="text-right" style="margin:0!important; margin-top:-25px!important;"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span>&nbsp;<small><?php echo $soru_say; ?> Soru</small></h4>
	</div>
</div>