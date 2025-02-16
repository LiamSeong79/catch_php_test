# catch_php_test
This repo Backend code test for Catch Design.

### Environment
- PHP 8
- Apache
- Docker
- Postgresql 15

### How to run
- Download repo
- Run command `docker-compose up -d` to execute
- It will create `customers` table with initialised data in `developement` database.

### How to Test
- This will return all records (http://localhost:8080/customers.php)
- It requires two parameters: `limit` and `page` for pagination (http://localhost:8080/customers.php?limit=100&page=1). The data structure will be like below

  <img width="181" alt="image" src="https://github.com/user-attachments/assets/39e5f73b-35f3-4af5-87e0-7e17ca14e6e1" />
