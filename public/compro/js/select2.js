function select2basic(target){

    $(target).ready(function() {
    	$('.basic-single').select2();
		$('.basic-multiple').select2();
		$('.select2-search__field').attr("placeholder", 'Pilih Beberapa');
		$('.select2-search__field').css("width", '100%');
    });
}