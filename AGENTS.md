# Repository Guidelines

This project uses the MySQL dump script `db.sql` to recreate the database `pacific_compressor`.
When modifying database-related code or the dump itself, follow these instructions:

1. Keep compatibility with MariaDB 10.4 syntax and defaults.
2. Use `ALTER TABLE` statements instead of re-creating tables when updating the schema.
3. Preserve existing default values, timestamps and foreign key constraints unless a change is required.
4. Document any new tables or schema changes directly in `db.sql` using SQL comments.
5. After editing the file, test the script by importing it with `mysql` or `phpMyAdmin` to ensure it runs cleanly.

These guidelines apply to the whole repository.
