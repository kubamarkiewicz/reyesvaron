
/* This file has to loaded before app.js */

window.config = window.config || {};

window.config.api = {

	"urls" : {
        "getProducts"           : "cms/api/products",
        "getNews"           	: "cms/api/news",
        "sendContact"          	: "cms/api/contact"
        // "sendContact"          	: "mail.php"
	}

}