1- Clone the Project
2- Create database name user_record
3- Execute the query 
   CREATE TABLE public."users"
    (
        uid serial NOT NULL,
        first_name character varying(250),
        last_name character varying(250),
        email character varying(250),
        createddate character varying(250),
        PRIMARY KEY (uid)
    )

4- Start the xampp server and pgadmin
5- path will be http://localhost/user_dashboard/users/index.php