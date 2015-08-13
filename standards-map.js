/*jslint
    browser, devel, white, maxlen: 80
*/
/*global
    window, document, parent
*/

/* define some handy quasi-constants */
var REMOTE_URL = 'https://skunkworks.stmarksschool.org/printable-forms/standards-map.php';

/* scrape data from CurricUplan DOM */
function scrape() {
	"use strict";
	var scraping = parent.Right.document.getElementById('TableMapItems');
	if (scraping !== null && scraping !== undefined) {
		var wrap = document.createElement('div');
		wrap.appendChild(scraping.cloneNode(true));
		return wrap.innerHTML;
	} else {
		return false;
	}
}

/* cache data on Skunk Works */
function remoteCacheData(scraping, url) {
	"use strict";
	url = url !== undefined ? url : REMOTE_URL;
	var http = new XMLHttpRequest();
	var params = 'analysis=' + scraping;
	http.open('POST', url, true);
	http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	http.onreadystatechange = function() {//Call a function when the state changes.
		if(http.readyState === 4 && http.status === 200) {
			window.location.assign(
				REMOTE_URL + '?map=' + http.responseText);
		}
	};
	http.send(params);
}

var scraping = scrape();
if (scraping) {
	remoteCacheData(scraping, REMOTE_URL);
}