$(document).ready(function() {
	$("form").validate();
});

/*
	Credit Card Type Detection
	
	Created by Nathan Searles <http://nathansearles.com>

	Version: 1.0
	Updated: June 30th, 2011

	(c) 2011 by Nathan Searles

	Licensed under the Apache License, Version 2.0 (the "License");
	you may not use this file except in compliance with the License.
	You may obtain a copy of the License at

	http://www.apache.org/licenses/LICENSE-2.0

	Unless required by applicable law or agreed to in writing, software
	distributed under the License is distributed on an "AS IS" BASIS,
	WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	See the License for the specific language governing permissions and
	limitations under the License.
*/

/*
	Test credit card numbers
	Visa: 4111111111111
	Mastercard: 5555555555554444
	American Express: 378282246310005
	Discover: 6011000990139424
*/

function validate( number ) {
	// Match and define
	var visa = number.match(/^4[0-9]{12}(?:[0-9]{3})?$/);
	var mastercard = number.match(/^5[1-5][0-9]{14}$/);
	var amex = number.match(/^3[47][0-9]{13}$/);
	var discover = number.match(/^6(?:011|5[0-9]{2})[0-9]{12}$/);
	var matched;
	var cvvFront = "assets/images/sprite.png";
	var cvvBack = "assets/images/sprite.png";
	
	// Create matched object
	if (visa) {
		matched = {
			name: "visa",
			cvv: "back"
		};
	} else if (mastercard) {
		matched = {
			name: "mastercard",
			cvv: "back"
		};
	} else if (amex) {
		matched = {
			name: "amex",
			cvv: "front"
		};
	} else if (discover) {
		matched = {
			name: "discover",
			cvv: "back"
		};
	} 

	if (matched) {
		// Fade out all but matched
		if (matched.name === "visa") {
			$("#credit_img").css({
			background: "url(assets/images/sprite.png) no-repeat 0 -206px"
			});
		} else if (matched.name === "mastercard") {
			$("#credit_img").css({
			background: "url(assets/images/sprite.png) no-repeat 0 -290px"
			});
		} else if (matched.name === "amex") {
			$("#credit_img").css({
			background: "url(assets/images/sprite.png) no-repeat 0 -164px"
			});
		} else if (matched.name === "discover") {
			$("#credit_img").css({
			background: "url(assets/images/sprite.png) no-repeat 0 -248px"
			});
		}

		// change cvv icon
		if (matched.cvv === "front") {
			$("#security_img").css({
				background: "url(" + cvvFront + ") no-repeat 0 -331px",
				top: "22px"
			});
		} else if (matched.cvv === "back") {
			$("#security_img").css({
				background: "url(" + cvvBack + ") no-repeat 0 -374px"
			});
		}
		
		return;
	}


}

$(function(){
	// Credit card validation
	$("#cardNumber").bind("keyup",function(){
		validate($(this).val());	
	});	
});

//Hide Element
document.getElementById("selectCard").style.display = "none";
