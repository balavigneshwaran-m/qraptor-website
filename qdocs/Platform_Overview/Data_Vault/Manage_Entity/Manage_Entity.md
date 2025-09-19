# Overview

Table is a powerful interface that allows you to visually define and manage your application's data models — also known as tables. It helps you structure and organize data in a way that mirrors a PostgreSQL database, without needing to write any SQL.

With Table, you can build the backbone of your application's data layer by creating tables, defining relationships, and uploading data from Excel files. Once your data structure is in place, it can be seamlessly used to power your applications, APIs, reports, or internal tools.

---

# Features

-  Create, rename, and delete tables as needed
-  Define and manage columns with data types and constraints
-  Upload Excel files to populate data into tables
-  Search within uploaded data records
-  Constraint support: Primary Key, Foreign Key, Unique, Not Null
-  Edit table schema anytime to add, remove, or modify columns
-  View uploaded data in a structured, readable format

---

# 1. Create a New Table

- Go to the Table section.
- Click on `+ Create Table`.
- Enter the table name (must **not** be a PostgreSQL reserved keyword).
- Add columns with their data types.
- Apply any needed constraints: `Not Null`, `Unique`, or `Foreign Key`.

>  The primary key column is **auto-generated** as a `bigint`. Do **not** define this manually.

![Image](/qdocs/Platform_Overview/Data_Vault/Manage_Entity/Manage_Entity_1.png)

![Image](/qdocs/Platform_Overview/Data_Vault/Manage_Entity/Manage_Entity_2.png)

# 2. Add or Modify Columns

- Click on the edit icon to modify the table details.
- You can:
  - Add new columns
  - Rename columns
  - Change data types
  - Apply constraints
- Click on the dropdown beside the table name to see the preview of the table schema.

![Image](/qdocs/Platform_Overview/Data_Vault/Manage_Entity/Manage_Entity_3.png)

>  Do not use PostgreSQL reserved keywords in table or column names.

# 3. Upload Data via Excel

- Click on `Import`.
- Choose a `.xlsx` file.

# Important Notes:

- The Excel file must **not** include the primary key column.
- Column headers in Excel must **exactly match** the table column names.
- Uploaded data is **read-only**. You cannot delete or edit it later.

![Image](/qdocs/Platform_Overview/Data_Vault/Manage_Entity/Manage_Entity_4.png)

![Image](/qdocs/Platform_Overview/Data_Vault/Manage_Entity/Manage_Entity_5.png)

![Image](/qdocs/Platform_Overview/Data_Vault/Manage_Entity/Manage_Entity_6.png)

![Image](/qdocs/Platform_Overview/Data_Vault/Manage_Entity/Manage_Entity_7.png)

# 4. View and Search Table Data

- Click on the last icon to view the data.
- Use the built-in search to filter rows by content in any column.
- Only **read** and **search** are supported on the data level.

![Image](/qdocs/Platform_Overview/Data_Vault/Manage_Entity/Manage_Entity_8.png)

![Image](/qdocs/Platform_Overview/Data_Vault/Manage_Entity/Manage_Entity_9.png)

>  **Note:** Once data is uploaded into a table via Excel, it cannot be deleted or updated from the UI. The uploaded data is read-only and can only be viewed or searched.

---

# 5. Table & Column Permission Management

The Table interface allows you to control access to your tables and their columns through a **Manage Permission** feature.

**Managing Table Permissions:**

1. Select one or more tables in the Table section.
2. Click on `Manage Permission` to open the permission panel.
3. Assign or remove access rights for the selected tables.
4. If there are any conflicts with existing permissions, you will be prompted to choose how to handle them:
   - Merge all permissions
   - Discard existing permissions and apply new ones
   - Start from scratch and assign fresh permissions

**Managing Column Permissions:**

1. Select one or more columns within a table.
2. Click on `Manage Permission`.
3. Assign or remove access rights for the selected columns.
4. Conflicting permissions are handled in the same way as for tables.

> This ensures that table and column access remains controlled, consistent, and secure.

---

# Best Practices

- Always finalize your column structure before uploading data.
- Use foreign keys to define relationships where applicable.
- Validate Excel file columns against the table structure before uploading.
- Periodically review table and column permissions to avoid outdated access.

---

# Do’s 

- Do use lowercase and underscores in table/column names.
- Do keep a backup of your Excel data.
- Do test small data uploads first.
- Do regularly manage and review table and column permissions.

---

# Don’ts 

- Don’t include the primary key column in Excel.
- Don’t expect to edit or delete data after uploading.
- Don’t use reserved PostgreSQL keywords.
- Don’t leave tables or columns with uncontrolled permissions.

---

# Highlights

-  **Robust Schema Control**: Full flexibility in managing your table structures.
-  **Quick Data Entry via Excel**: Fast and bulk data input.
-  **Smart Search**: Locate your data across tables with ease.
-  **Permission Management**: Secure control over table and column access.

---

# Summary

Table is designed for managing table structures and uploading relational data in a PostgreSQL-like environment — all through a clean interface. While your schema is fully editable, uploaded data is intentionally kept read-only for stability and control. Table and column permissions allow for flexible, secure access management across your data models.
