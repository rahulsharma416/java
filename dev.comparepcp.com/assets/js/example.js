function wow_default_alertnew() {
    alert("Already 4 items added");
}

function wow_default_alertcomparepage() {
    alert("Please select at least one car for test drive");
}

function wow_default_alertindexpage() {
    alert("Please select a cars for compare");
}

function wow_default_alert() {
    alert("Email Id already exists. Please enter a different Email Id");
}

function wow_default_alertsuccess() {
    alert("Your email id submitted successfully");
}

function wow_default_alerterror() {
    alert("Error");
}

function wow_default_alertrequire() {
    alert("Email Id is require");
}

function wow_default_alertcontactussuccess() {
    alert("your form has been submitted. we will contact you as soon as possible");
}

function wow_default_alertproductsubmit() {
    alert("Your product submitted successfully");
}

function wow_default_alertexcelimport() {
    alert("Your excel sheet uploaded successfully");
}
function wow_default_alertexcelerror() {
    alert("Error in Excel");
}
function wow_default_alertexcelempty() {
    alert("Excel Sheet is Empty");
}

function wow_default_browsererror() {
    alert("This browser doesn't support HTML5 file uploads!");
}

function wow_default_alert_with_callback() {
    alert("Hello World! Press 'YES' & Check Your Console Log.",
	{
	    label: "YES",
	    success: function () {
	        console.log("User clicked YES");
	    }
	}
	);
}

function wow_default_duplicatesuccess() {
    alert("Duplicate record added");
}
function wow_delete_dealercarsuccess() {
    alert("Dealer car deleted successfully!");
}
function wow_delete_dealercarerror() {
    alert("Select checkbox for delete record!");
}
function wow_default_alertproductedit() {
    alert("Your product is edit successfully");
}

function wow_default_car_alreadyAdded() {
    alert("Maximum 4 car allow for compare");
}
function wow_default_alert() {
    alert("EmailId is already exist");
}
function wow_default_alerterror() {
    alert("Error");
}
function wow_postcode_alerterror() {

    alert("Sorry, unfortunately we don't recognize the postcode " + $('#droptown1').val() + '<br>' + " you have entered. Please can you re-enter..",
	{
	    label: "OK",
	    success: function () {
	        document.getElementById('droptown1').focus();
	    }
	}
	);


}