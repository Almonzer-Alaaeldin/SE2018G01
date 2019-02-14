$(document).ready(function () {
	$("html, body").animate({ scrollTop: 0 }, 1000, 'swing');
	setTimeout(function() {
		$("body").addClass("loaded");
		$("h1").css("color", "#222222");
	}, 3000);
	//Add .active to current navbar button
	var url = window.location.href;
	if (url.includes('?')) {
		url = url.substr(0,url.indexOf('?'));
	}
	$('ul.navbar-nav a').filter(function() {
		 return this.href == url;
	}).addClass("active").closest(".nav-item").addClass("active");
});