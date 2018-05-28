<div class="panel panel-default">
	<div class="panel-body">
		<h4 style="margin:0!important; color: #07445d; font-size: 17px; font-family: century gothic;">
			<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;<b><?php echo $konu["ders_adi"]." - ".$konu["konu_adi"]; ?></b>
		</h4>
		<a class="btn btn-primary btn-sm" href="index.php?git=testler&id=<?php echo $konu['konu_id']; ?>" role="button" style="display:inline-block; margin-top:15px;">Testleri Gör</a>
		<h4 class="text-right" style="margin:0!important; margin-top:-25px!important;"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;<small><?php echo $konu_say; ?> Test</small></h4>
	</div>
</div>