# bondphp
Php for access to meaningful information from a bond distribution service database.


Introduction
You will be using a MySql database hosted on UW’s shared server (such as vergil.u.washington.edu), you may use the PHP reference (css475php). This is a simplified PHP client-server application that generates HTML webpages. The files of project would be stored in a subdirectory of public_html or student_html folders on UW servers. You will need to customize the config.inc.php file for your DBMS specific parameters much in the same way as you customized the configuration file for PhpMyAdmin. PHP code calls the mysqli database layer to interact with MySql database.

Required Work

Modify the application to use your database and recreate the functionality (such as reports) from a subset of the original artifacts.

Your application should be able to:

(1) Produce ONE meaningful list-based report based on the original artifacts

Allow you to optionally filter the list on at least one meaningful parameter
Filters should allow partial matches
Includes end-user meaningful fields on report like the original artifact (not just artificial keys)
Contain a hyperlink per row that expands into next report (2)
Sorted in a meaningful way
(2) Produce ONE meaningful detail report based on the original artifacts

The detail report should be generated based on selecting a hypertext link on a row from list-based report (1) from above.
Complex enough detail to require at least a THREE-WAY JOIN
The detail report should include both header data and detail data related to object of interest
(3) Be able to update at least ONE meaningful table related to your reports

You should be able to navigate to the update from the detail report
The table to update should not be a code table.
The reports should be reasonably formatted. Aesthetic and elegant reports are a bonus. 

You will need to submit a zipped file of your source code. You will need to provide a URL (web location) for your website that can be accessed by your instructor.

Strong recommend that you use the previously submitted project database containing queries as the basis for this assignment. You can choose queries as basis for both the list and the detail reports.

All code written MUST BE SECURE VERSUS SQL INJECTION ATTACKS! (up to 50 point penalty for insecure code).

Samples
(Updated Example Code with More Comments)

See Google Drive Class Project folder

Useful Resources
Tutorials and Syntax for JavaScript, HTML, PHP, MySQL, SQL
http://www.w3schools.com/ (Links to an external site.)
(Note this is a "front-end" application -- PHP, C#, etc., examples are not appropriate here)

