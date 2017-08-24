$(document).ready(function() {
	console.log("Search script started!");
	// this function is run once the DOM is ready

	$("#search-button").click(function(event) {
		console.log("Search button clicked!");

		var bar = $("#search-bar");
		var text = bar.val();

		// generate uri
		var uri = "https://www.doc.ic.ac.uk/project/2016/163/g1616332/WebPage/Contents/Search/Search_Page.html#";
		uri += text;
		uri = encodeURI(uri);

		window.location.href = uri;
		if (window.isSearchPage) {
            window.location.reload();
		}

		// this prevents clicking the button redirecting the user
		event.preventDefault();
	});
});