var BookStoreCookie = {
	
	Day: 7 * 24 * 60 * 60 * 1000,

	save: function(bookId, bookNum) {
		var expires = new Date();
		expires.setTime(expires.getTime() + this.Day); 
		document.cookie =  bookId + " = " + bookNum + "; expire="+expires.toGMTString(); 
	},


	get: function(bookId) {
		var strCookie = document.cookie;
         		var arrCookie = strCookie.split("; ");
         		for(var i = 0; i < arrCookie.length; i++) {
         			var arr = arrCookie[i].split("=");
         			if(parseInt(arr[0]) === parseInt(bookId)) {
         				return arrCookie[i];
         			}
         		}

         		return ""; 
	},

	getAll: function() {
		var cookies = [];
		var strCookie = document.cookie;
		var arrCookie = strCookie.split("; ");
		for(var i = 0; i < arrCookie.length; i++) {
			var arr = arrCookie[i].split("=");
			var cookieObj = {};
			cookieObj.id = arr[0];
			cookieObj.num = arr[1];
			cookies.push(cookieObj);
		}
		return cookies;
	},

	del: function(bookId) {
		var expires = new Date();
		expires.setTime(expires.getTime() - 100); 
		document.cookie =  bookId + '=zero; expires=' + expires.toGMTString();
	}
};