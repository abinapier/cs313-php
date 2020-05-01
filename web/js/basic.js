function goto(page){
	window.location.href = page;
}

function addActiveClass(navItemNum){
	navitem = $("nav:nth-of-type("+navItemNum+")");
	navitem.addClass("active");
}