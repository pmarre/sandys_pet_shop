//Form Validation 

var regexEmail = /^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/;

function groomingFormValidation(form){
    var fname = form.fname.value;
    var lname = form.lname.value;
    var phone = form.phone.value;
    var email = form.email.value;
    var address = form.address.value;
    var city = form.city.value;
    var state = form.state.value;
    var zip = form.zip.value;
    var pet = form.pet.value;
    var errors = [];

    if (fname == ''){
        errors[errors.length] = 'Must enter valid first name.';
    } 

    if (lname == ''){
        errors[errors.length] = 'Must enter valid last name.';
    }

    if (phone == ''){
        errors[errors.length] = 'Must enter valid phone number.';
    }

    if (address == ''){
        errors[errors.length] = 'Must enter valid address.';
    }

    if (city == ''){
        errors[errors.length] = 'Must enter valid city.';
    }

    if (state == ''){
        errors[errors.length] = 'Must enter valid state.';
    }

    if (zip == ''){
        errors[errors.length] = 'Must enter valid zip code.';
    }

    if (pet == 'Select Pet'){
        errors[errors.length] = 'Must enter select pet.';
    }

    if (!regexEmail.test(email)){
        errors[errors.length] = 'Must enter valid email address.';
    }
    if (errors.length > 0){
        reportErrors(errors);
        return false;
    }
    return true;
}

function reportErrors(errors){
    var msg = 'There were some problems...\n';
    for (var i = 0; i<errors.length; i++){
        var numError = i + 1;
        msg += "\n" + numError + '. ' + errors[i];
    }
    alert(msg);
    
}

function contactFormValidation(form){
    var fname = form.fname.value;
    var lname = form.lname.value;
    var email = form.email.value;
    var message = form.message.value;
    
    var errors = [];

    if (fname == ''){
        errors[errors.length] = 'Must enter valid first name.';
    } 

    if (lname == ''){
        errors[errors.length] = 'Must enter valid last name.';
    }

    if (message == ''){
        errors[errors.length] = 'Must enter message.';
    }

    if (!regexEmail.test(email)){
        errors[errors.length] = 'Must enter valid email address.';
    }
    
    if (errors.length > 0){
        reportErrors(errors);
        return false;
    }

    return true;
}

function reportErrors(errors){
    var msg = 'There were some problems...\n';
    for (var i = 0; i<errors.length; i++){
        var numError = i + 1;
        msg += "\n" + numError + '. ' + errors[i];
    }
    alert(msg);
    
}


//AJAX Submit Contact Form


$(document).ready(function(){
    var form = $('#contactForm');
    var formMessage = $('#form-message');
    // var contactDiv = $('#contact');
    $(form).on('submit', function(e){
        e.preventDefault();
        if (contactFormValidation(this)){
        var formData = $(form).serialize();
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
        }).done(function(){
            $(formMessage).removeClass('error');
            $(formMessage).addClass('success');
            $(form).removeClass('submit_error');
            $(form).addClass('submit_success');

            $(formMessage).html('<h2>Your email has been sent!</h2><span>We will contact you in 1-2 business days</span>');

            $('#firstName').val('');
            $('#lastName').val('');
            $('#contactEmail').val('');
            $('#message').val('');
        }).fail(function(data){
            $(formMessage).removeClass('success');
            $(formMessage).addClass('error');
            $(form).removeClass('submit_success');
            $(form).addClass('submit_error');
            if (data.responseText !== '') {
                $(formMessage).html('<span>There were was an error in your submission, please correct and try again.<span>');
            } else {
                $(formMessage).text('Failed to send email');
            }
        });
    } else {
        return false;
    }
    });
});




