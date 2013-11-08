This small app is comprised of:
   one php handler file handler.php
   one index.html file
   folder dist containing the needed local libraries
   folder info containing info about the DB setup

The app uses JQuery along with Bootsrap to make development quicker.
The it's self contains two buttons a add button used to add records to the Database and a delete button used to delete records.
Record entry is done through an html pop up that is displayed when the Add Record button is pressed.
The deletion occurs when the delete check box is selected and the Delete Record button is pressed.

The handler.php calls return information only if the call is a $_POST and the data sent is valid( not empty).
The statements are prepared to allow for mixed data to be stored in the database table fields.

The handler.php file handles query request via $_POST only and returns the result set as a JSON string.
jQuery handles the callback conversion of JSON to html and populates the table.

By default the handler.php file does not allow for direct access. This can be further enhanced by using session.

Bootstrap/JQueryUI are used mainly for UX things such as making the interface look friendly, allow for a better interface design,...



Regards,
Francisco Velazquez


