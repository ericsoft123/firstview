$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

	$(document).ready(function(){
		"use strict";
		$('#send').click(function(e){
			
			$.ajax({
				url:"./create",
				method:"post",
				data:$("#formadd_data").serialize(),
				success:function()
				{
					console.log('sent');
					
				}
				
			});
			e.preventDefault();
		});
	});

$("#phone").intlTelInput({
  initialCountry: "auto",
  geoIpLookup: function(callback) {
    $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
      var countryCode = (resp && resp.country) ? resp.country : "";
      callback(countryCode);
    });
  },
  utilsScript: "../../build/js/utils.js" // just for formatting/placeholders etc
});


$(document).ready(function(){ //this where page loading This is for profile page code
	"use strict";
	///$('#test').text("good byakunze");
	//This is for profile page code
	//--------------- get phone number with flag----------------------//
	
	  $("#phone1").intlTelInput({
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: "body",
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js"
    });
	$("#phone2").intlTelInput({
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: "body",
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js"
    });
	$("#phone3").intlTelInput({
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: "body",
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js"
    });
	$("#phone4").intlTelInput({
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: "body",
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js"
    });
	//-----------------------------------------//
	//This is for profile page code
	
	//-----------------------------------------//
	//This for Registration page
		$("#phone").intlTelInput({
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: "body",
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js"
    });
	//This for Registration page
	//-----------------------------------------//
	// get the country data from the plugin
var countryData = $.fn.intlTelInput.getCountryData(),
	//for registration page
	telInput = $("#phone"),
	addressDropdown = $("#address-country"),
	//for registration page
  telInput1 = $("#phone1"),

  addressDropdown1 = $("#address-country1"),
	telInput2 = $("#phone2"),
  addressDropdown2 = $("#address-country2"),
	
	
	telInput3= $("#phone3"),
  addressDropdown3 = $("#address-country3"),
	
	telInput4= $("#phone4"),
  addressDropdown4= $("#address-country4");
	


	////for registration page
	// init plugin
telInput.intlTelInput({
  utilsScript: "../../build/js/utils.js" // just for formatting/placeholders etc
});

// populate the country dropdown
$.each(countryData, function(i, country) {
  addressDropdown.append($("<option></option>").attr("value", country.iso2).text(country.name));
});
// set it's initial value
var initialCountry = telInput.intlTelInput("getSelectedCountryData").iso2;
addressDropdown.val(initialCountry);

// listen to the telephone input for changes
telInput.on("countrychange", function(e, countryData) {
  addressDropdown.val(countryData.iso2);
	 var intlNumber = $("#phone").intlTelInput("getNumber");
		$('#cell').val(intlNumber);
});

// listen to the address dropdown for changes
addressDropdown.change(function() {
  telInput.intlTelInput("setCountry", $(this).val());
	 var intlNumber = $("#phone").intlTelInput("getNumber");
		$('#cell').val(intlNumber);
});
	
	
	
	////

// init plugin
telInput1.intlTelInput({
  utilsScript: "../../build/js/utils.js" // just for formatting/placeholders etc
});

// populate the country dropdown
$.each(countryData, function(i, country) {
  addressDropdown1.append($("<option></option>").attr("value", country.iso2).text(country.name));
});
// set it's initial value
var initialCountry1 = telInput1.intlTelInput("getSelectedCountryData").iso2;
addressDropdown1.val(initialCountry1);

// listen to the telephone input for changes
telInput1.on("countrychange", function(e, countryData) {
  addressDropdown1.val(countryData.iso2);
	 var intlNumber1 = $("#phone1").intlTelInput("getNumber");
		$('#child1_cell').val(intlNumber1);
});

// listen to the address dropdown for changes
addressDropdown1.change(function() {
  telInput1.intlTelInput("setCountry", $(this).val());
	 var intlNumber1 = $("#phone1").intlTelInput("getNumber");
		$('#child1_cell').val(intlNumber1);
});
	/////
	telInput2.intlTelInput({
  utilsScript: "../../build/js/utils.js" // just for formatting/placeholders etc
});

// populate the country dropdown
$.each(countryData, function(i, country) {
  addressDropdown2.append($("<option></option>").attr("value", country.iso2).text(country.name));
});
// set it's initial value
var initialCountry2 = telInput2.intlTelInput("getSelectedCountryData").iso2;
addressDropdown1.val(initialCountry2);
	
	
	
	
	/////////////////////////////
	
	
	telInput3.intlTelInput({
  utilsScript: "../../build/js/utils.js" // just for formatting/placeholders etc
});

// populate the country dropdown
$.each(countryData, function(i, country) {
  addressDropdown3.append($("<option></option>").attr("value", country.iso2).text(country.name));
});
// set it's initial value
var initialCountry3 = telInput3.intlTelInput("getSelectedCountryData").iso2;
addressDropdown3.val(initialCountry3);
	/////////////////////////
	//////////////////////////////////////////
	telInput3.on("countrychange", function(e, countryData) {
  addressDropdown3.val(countryData.iso2);
	var intlNumber3 = $("#phone3").intlTelInput("getNumber");
		$('#super_child3cell').val(intlNumber3);
});

// listen to the address dropdown for changes
addressDropdown3.change(function() {
  telInput3.intlTelInput("setCountry", $(this).val());
	var intlNumber3 = $("#phone3").intlTelInput("getNumber");
		$('#super_child3cell').val(intlNumber3);
});
	
	
	
	/////////////////////////////
	

// listen to the telephone input for changes
telInput2.on("countrychange", function(e, countryData) {
  addressDropdown2.val(countryData.iso2);
	var intlNumber2 = $("#phone2").intlTelInput("getNumber");
		$('#child2_cell').val(intlNumber2);
});

// listen to the address dropdown for changes
addressDropdown2.change(function() {
  telInput2.intlTelInput("setCountry", $(this).val());
	var intlNumber2 = $("#phone2").intlTelInput("getNumber");
		$('#child2_cell').val(intlNumber2);
});
});




$(document).ready(function(){
	"use strict";
	////for Registration page
	$('#phone').keydown(function(){
		
		 var intlNumber = $("#phone").intlTelInput("getNumber");
		$('#cell').val(intlNumber);
	});
	$('#phone').keyup(function(){
		
		 var intlNumber = $("#phone").intlTelInput("getNumber");
		$('#cell').val(intlNumber);
	});
	
	
	
	
	////
	$('#phone1').keydown(function(){
		
		 var intlNumber1 = $("#phone1").intlTelInput("getNumber");
		$('#child1_cell').val(intlNumber1);
	});
	$('#phone1').keyup(function(){
		
		 var intlNumber1 = $("#phone1").intlTelInput("getNumber");
		$('#child1_cell').val(intlNumber1);
	});
	///
	$('#phone2').keydown(function(){
		
		 var intlNumber2 = $("#phone2").intlTelInput("getNumber");
		$('#child2_cell').val(intlNumber2);
	});
	$('#phone2').keyup(function(){
		
		 var intlNumber2 = $("#phone2").intlTelInput("getNumber");
		$('#child2_cell').val(intlNumber2);
	});
	//////////////////////////////////////
	
	$('#phone3').keydown(function(){
		
		 var intlNumber3 = $("#phone3").intlTelInput("getNumber");
		$('#super_childcell').val(intlNumber3);
	});
	$('#phone3').keyup(function(){
		
		 var intlNumber3 = $("#phone3").intlTelInput("getNumber");
		$('#super_child3cell').val(intlNumber3);
	});
	
	///////////////////////////////////////
});