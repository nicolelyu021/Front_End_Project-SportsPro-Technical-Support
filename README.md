# Front_End_Project-SportsPro-Technical-Support (Group Project)
CS 380

code I contributed: SelectCustomerPage.php; UpdateCustomerPage; ProcesUpdateCustomer.php


# #  The design of the SportsPro Technical Support application
The SportsPro Technical Support application consists of web pages that provide functions for three types of users. First, it lets administrators perform functions such as maintaining the Products, Customers, and Technicians tables of the tech_support database. Second, it lets technicians perform functions such as updating incidents. And third, it lets customers perform functions such as registering products.
Most steps of this (and future) assignments have you add one or more new pages to the SportsPro application. For example, Part 1 has you add two pages that let an administrator manage the products in the database. 

# # The design of the Tech Support database
The tech_support database is used to track technical support incidents. It consists of the seven tables shown in the diagram that follows. The incidents table contains one row for each technical support incident. Each row in the incidents table is related to one row in the customers table, which contains information about the company’s customers; one row in the products table, which contains information about the company’s products; and one row in the technicians table, which contains information about the company’s technical support staff.
In addition, a table named registrations keeps track of the products that are registered to each customer, a table named countries stores the countries of the world, and a table named administrators stores the usernames and passwords for the administrators. Note that the administrators table is not related to any of the other tables.
 
In addition to the column data types shown above, you should know that the customerID, incidentID, and techID columns in the customers, incidents, and technicians tables are AUTO_INCREMENT columns. So, the values of these columns are set automatically when new rows are added to these tables. For more details about this database, you can use MySQL Workbench to view the structure and data that’s stored in the database.
