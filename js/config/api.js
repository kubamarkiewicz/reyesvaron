
/* This file has to loaded before app.js */

window.config = window.config || {};

window.config.api = {

	"urls" : {
        "getPages"              : "cms/api/pages",
        "getProducts"           : "cms/api/products",
        "getNews"           	: "cms/api/news",
        "getRecetas"           	: "cms/api/recetas",
        "sendContact"          	: "cms/api/contact"
	}

}