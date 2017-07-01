$('.quick-sidebar-toggler').click(function (e){
	e.preventDefault();
	if(this.getAttribute('done')){
		return;
	}
	else{
		document.getElementById('logout-form').submit();
		this.setAttribute('done', true);
	}
});
