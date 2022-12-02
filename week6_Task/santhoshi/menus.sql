CREATE TABLE menus(
    id SERIAL PRIMARY KEY NOT NULL,
    menu VARCHAR (30),
    slug VARCHAR(30)
);

INSERT INTO menus(menu,slug)
VALUES ('Create Employee','create_employees'),('Employee Salaries','employee_salaries'),('Bill Entry','bill_entries'),('Transaction','transaction_details');


INSERT INTO menus(menu,slug)
VALUES ('Transaction','transaction_details');

--delete the inserted query
DELETE FROM COMPANY WHERE ID = 2;