     
let adminBirthdate = document.querySelector("#admin_birthdate");
let studentBirthdate = document.querySelector("#student_birthdate");

function maxDate(element){
    const date = new Date();
    date.setYear(date.getFullYear() - 18);
    element.max = date.toISOString().split("T")[0]; //this simply converts it to the correct format
    element.value = date.toISOString().split("T")[0];
}

maxDate(studentBirthdate);
maxDate(adminBirthdate);