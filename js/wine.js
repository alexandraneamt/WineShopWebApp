window.onload = function () {

    // defines an event listener for the '#createWineForm'
 
    var createWineForm = document.getElementById('createWineForm');
    if (createWineForm !== null) {
        createWineForm.addEventListener('submit', validateWineForm);
    }
    
    function validateWineForm(event) {
        var form = event.target;
        
        var name = form['name'].value;
        var description = form['description'].value;
        var year = form['year'].value;
        var type = form['type'].value;
        var servingTemp = form['servingTemp'].value; //set variables to the values entered in the form

        var spanElements = document.getElementsByClassName("error");
        for (var i = 0; i !== spanElements.length; i++) {
            spanElements[i].innerHTML = "";
        }

        var errors = new Object(); //creates errors object

        if (name === "") {
            errors["name"] = "Name cannot be empty\n";
        }
        if (description === "") {
            errors["description"] = "Description cannot be empty\n";
        }
        if (year === "") {
            errors["year"] = "Year cannot be empty\n";
        }
        if (type === "") {
            errors["type"] = "Type cannot be empty\n";
        }
        if (servingTemp === "") {
            errors["servingTemp"] = "Serving Temperature cannot be empty\n";
        }

        var valid = true;
        for (var index in errors) {
            valid = false;
            var errorMessage = errors[index];
            var spanElement = document.getElementById(index + "Error");
            spanElement.innerHTML = errorMessage;
        }

        if (!valid || !confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }

    
    // defines an event listener for the '#createWineForm'
   
    var editWineForm = document.getElementById('editWineForm');
    if (editWineForm !== null) {
        editWineForm.addEventListener('submit', validateWineForm);
    }

   
    // defines an event listener for any '.deleteWine' links
   
    var deleteLinks = document.getElementsByClassName('deleteWine');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this wine?")) {
            event.preventDefault();
        }
    }

};