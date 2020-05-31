function validate() {
    var userFirstName = document.getElementById('first_name').value;
    var userLastName = document.getElementById('last_name').value;
    var userStudent_Id = document.getElementById('age').value;
    var userEmail = document.getElementById('email').value;
    var userPassword = document.getElementById('password').value;

    var nameRGEX = /^[a-zA-Z0-9]+$/;
    var emailRGX = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    var passwordRGX = /^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{6,}$/;
    var phoneRGEX = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;

    var firstnameResult = nameRGEX.test(userFirstName);
    var lasttnameResult = nameRGEX.test(userLastName);
    var student_IdResult = phoneRGEX.test(userStudent_Id);
    var emailResult = emailRGX.test(userEmail);
    var passwordResult = passwordRGX.test(userPassword);


    if (firstnameResult == false) {
        alert('Please enter a valid user first name');
        return false;
    }
    if (lasttnameResult == false) {
        alert('Please enter a valid user last name');
        return false;
    }
    if (student_IdResult == false) {
        alert('Please enter a valid user student id');
        return false;
    }
    if (emailResult == false) {
        alert('Please enter a valid email');
        return false;
    }
    if (passwordResult == false) {
        alert('Please enter a valid password');
        return false;
    }
    return true;
}