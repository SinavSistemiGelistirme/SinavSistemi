/*$(function(){
	$('input[type="checkbox"]').on('change', function() {
		$('input[name="' + this.name + '"]').not(this).prop('checked', false);
	});
});*/



$(function(){
	$("#SoruFormu").find('input[type="checkbox"]').on('change', function(){
		$('input[name="' + this.name + '"]').not(this).prop('checked', false);
	});
});
