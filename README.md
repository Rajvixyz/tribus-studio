Tribus Number Addition
======================


Instructions
------------

Unpack in the *modules* directory of your Drupal installation and enable in`/admin/modules`.

Then, visit `/admin/config/input-numbers/settings` and enter two numbers and save configration.

To check the Addition of two numbers visit `/number-addition`

Development Notes
-----------------

- Firstly created configration form into `src/Form` for number input.
- Created routing file to define the route for config form and output page.
- Created menu file to put Input Numbers settings in the configartion menu.
- Created service file to define 2 services.
- Created service NumberAdderService(service 1) into `src/Service` folder for addition of two input number.
- Created StringFormatterService(service 2) into `src/Service` folder for return string with addition of two numbers and used 
  NumberAdderService(service 1) for numbers and addition.
- Created controller into `src/Controller` to show the string. Used StringFormatterService(service 2) in the controller.
- Created module file for include theme hook.
- Created template into `templates` file into the template folder to manage classes and structure for the string.
