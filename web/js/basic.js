function goto(page){
	window.location.href = page;
}

function addActiveClass(navItemNum){
	navitem = $("nav li:nth-of-type("+navItemNum+") a");
	navitem.addClass("active");
}