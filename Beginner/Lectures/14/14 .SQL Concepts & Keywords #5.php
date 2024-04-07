(( SQL Concepts & Keywords #5 ))
<p></p>

<!--  -->
<?php
error_reporting(0);

// import config file
$server = '../../config.php';
include_once($server);


// Create a connection
$con = new mysqli($serverhost, $username, $password, $dbname);

if ($con->connect_error) {
    echo "error";
    die("Connection Failed : " .$con->connect_error);
}else{
    echo "connected";

    // COUNT(): Counts the number of rows.
    // SUM(): Calculates the sum of values.
    // AVG(): Computes the average of values.
    // MIN(): Returns the minimum value.
    // MAX(): Returns the maximum value.
    // =============

    // SELECT column1, SUM(column2) FROM table_name GROUP BY column1;
    // GROUP BY: This groups rows that have the same values into summary rows.
    //  It's often used with aggregate functions like SUM(), COUNT(), AVG(), etc.
    // =============
    // SELECT column1, SUM(column2) FROM table_name GROUP BY column1 HAVING SUM(column2) > 100;
    // These are fundamental SQL keywords and concepts used for querying databases. 
    // They allow you to retrieve, filter, and manipulate data based on your 
    // requirements. Each of these keywords plays a specific role in constructing queries 
    // to extract the desired information from a database.

    // =============
    // SELECT COUNT(*), AVG(salary) FROM employees;

    // SELECT column1 FROM table1 WHERE column2 IN 
    // (SELECT column2 FROM table2 WHERE condition);
    // Subqueries: These are nested queries within another query.
    // They can be used in SELECT, FROM, WHERE, and other clauses.
    // =============
    // Aliases: These are temporary names assigned to columns or 
    // tables in a query for better readability or to shorten lengthy names.

    // SELECT column1 AS alias_name FROM table_name;

    // =============
    // Joins (INNER, OUTER, RIGHT, FULL): Besides LEFT JOIN,
    // there are other types of joins used to combine rows from different tables
    // based on related columns. INNER JOIN retrieves records 
    // that have matching values in both tables.

    // SELECT * FROM table1 INNER JOIN table2 ON table1.column_name = table2.column_name;
    // =============
    // UNION: This combines the result sets of two or more SELECT statements.
    // It removes duplicate rows by default, whereas UNION ALL includes all rows.

    // SELECT column1 FROM table1 UNION SELECT column2 FROM table2;
    // =============
    // Transactions: These ensure the integrity of the database by grouping 
    // multiple queries into a single unit, ensuring that either 
    // all of the queries are executed successfully or none of them are.

    // START TRANSACTION;
    // -- SQL queries here
    // COMMIT;
    // =============
    // Indexes: These are used to speed up the querying process by 
    // allowing quicker access to rows in a table. 
    // Indexes can be created on one or more columns.
    
    // SELECT INDEX index_name ON table_name (column_name);
    // =============
    // Views: These are saved SQL queries as virtual tables. 
    // They can be used to simplify complex queries or provide a 
    // specific perspective of the data.

    // CREATE VIEW view_name AS SELECT column1, column2 FROM table_name WHERE condition;
    // =============
    // Stored Procedures: These are sets of SQL statements stored in the database 
    // and can be called and executed multiple times. 
    // They help modularize code and improve security.
    
    // CREATE PROCEDURE procedure_name
    // AS
    // BEGIN
    //     -- SQL statements
    // END;
    // =============
    // Triggers: These are actions that are automatically performed when a
    // specified event (e.g.,CREATE, INSERT, UPDATE, DELETE) occurs in a database.

    // CREATE TRIGGER trigger_name
    // AFTER INSERT ON table_name
    // FOR EACH ROW
    // BEGIN
    //     -- SQL statements
    // END;
    // =============
    // Constraints: These are rules imposed on data columns to enforce data 
    // integrity. Common types include:

    // NOT NULL: Ensures a column cannot have a NULL value.
    // UNIQUE: Ensures values in a column are unique.
    // PRIMARY KEY: Uniquely identifies each record in a table.
    // FOREIGN KEY: Enforces referential integrity in a table.

    // CREATE TABLE table_name (
    // column1 INT NOT NULL,
    // column2 VARCHAR(50) UNIQUE,
    // PRIMARY KEY (column1)
    // );
    // =============
    // Full-text Search: This allows for more natural language-based searches
    // within text-based columns.
   
    // SELECT * FROM articles WHERE MATCH (title, content) AGAINST ('search_keyword');
    // =============

//     CASE Statements: These allow for conditional logic within SQL queries,
//     enabling you to perform different actions based on specified conditions
   
//    SELECT column1, 
//           CASE 
//               WHEN condition1 THEN 'Result 1'
//               WHEN condition2 THEN 'Result 2'
//               ELSE 'Default Result'
//           END AS new_column
//    FROM table_name;
    // =============

    // Date and Time Functions: SQL provides various functions to work with dates and times, 
    // allowing manipulation, extraction, and formatting of date/time data
    
    // SELECT DATE_FORMAT(date_column, '%Y-%m-%d') AS formatted_date FROM table_name;
    // =============
    // Window Functions (Analytic Functions): These functions perform 
    // calculations across a set of rows related to the current row within a query result
    
    // SELECT column1, column2, 
    //        ROW_NUMBER() OVER (PARTITION BY column1 ORDER BY column2) AS row_num
    // FROM table_name;
    // =============

    // Common Table Expressions (CTEs): These temporary result sets 
    // are defined within the execution of a single SQL statement and can
    //  be referenced within SELECT, INSERT, UPDATE, or DELETE statements.
    
    
    // WITH cte_name AS (
    //     SELECT column1, column2 FROM table_name
    // )
    // SELECT * FROM cte_name WHERE column1 > 10;
    // =============
    
    // NULL Handling: SQL offers functions and operators to handle NULL values, 
    // such as COALESCE() to return the first non-NULL value among its arguments.
    
    // SELECT COALESCE(column1, 'N/A') AS new_column FROM table_name;
    // =============

    // ROLLUP and CUBE: These are used in conjunction with GROUP 
    // BY to generate subtotals and super totals for aggregate data.
    
    // SELECT column1, column2, SUM(column3)
    // FROM table_name
    // GROUP BY ROLLUP(column1, column2);
    // =============

    // Recursive Queries: Some SQL implementations support recursive 
    // queries that enable iteration and repetition in querying 
    // hierarchical data structures.
    
    // WITH RECURSIVE cte_name AS (
    //     SELECT * FROM table_name WHERE parent_id IS NULL
    //     UNION ALL
    //     SELECT t.* FROM table_name t JOIN cte_name c ON t.parent_id = c.id
    // )
    // SELECT * FROM cte_name;
    // =============
    // Pivoting and Unpivoting Data: Pivoting involves 
    // rotating data from rows into columns, while unpivoting 
    // does the opposite.
    
    // SELECT *
    // FROM (
    //     SELECT category, value FROM table_name
    // ) AS SourceTable
    // PIVOT (
    //     MAX(value) FOR category IN ('Category1', 'Category2', 'Category3')
    // ) AS PivotTable;
    // =============

    // JSON Support: Many databases offer functionality 
    // to store, query, and manipulate JSON data within SQL queries.
    
    // SELECT column->>'$.key' AS extracted_value FROM table_name;
    // =============

    // Database Security and Permissions: Advanced SQL involves managing database security, 
    // roles, and permissions to control access to data and operations
    
    // GRANT SELECT, INSERT, UPDATE ON table_name TO root;
    
    // close the connection
    mysqli_close($con);
    // -----------
};
?>