$('.form-disable').on('submit',function(){

	var self=$(this),
	button=self.find('button[type="submit"],button');


	button.attr('disabled','disabled');



	return true;
});