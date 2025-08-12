# Node Guide: Insert Multiple Row

## Overview

The **Insert Multiple Row** node is used to **insert a batch of records** into a selected table in a single operation.  
It simplifies bulk data insertion, reducing the need to loop through individual records manually.

## What This Node Does

● Inserts multiple rows into a database table  
● Takes the data from a list variable  

**Returns:**

● `insert_status`: Indicates if the operation was successful or failed  

## Configuration Details

### 1. Entity Name (Table)

● Mandatory  
● Select the destination table from the dropdown list of available entities

![ :( Can't load image ](/qdocs/Agent_Nodes/Data_Management/Insert_Multiple_Rows/Insert_Multiple_Row_Image_1.png)

### 2. Rows Variable

● Select the agent variable that contains the data to be inserted  
● This variable should hold a **list of dictionaries**, where each dictionary represents a row to be inserted  
● Each dictionary must follow the target table’s column schema  

**Example Variable Value:**

```
[
  { "emp_name": "John", "department": "Engineering" },
  { "emp_name": "Jane", "department": "Marketing" }
]
```

![ :( Can't load image ](/qdocs/Agent_Nodes/Data_Management/Insert_Multiple_Rows/Insert_Multiple_Row_Image_2.png)

Keys must match the column names of the selected table

## Inputs
**Entity Name:** Select the table where records will be inserted  
**Rows Variable:** Select the variable containing the list of rows (records)

## Outputs
**insert_status:**  
• A mandatory variable mapping  
• Will store the result status of the bulk insert operation (e.g., Success, Failure)

## When to Use
Use this node when you want to:  
• Insert bulk data in a single step  
• Improve efficiency by avoiding multiple Insert Row calls  
• Handle form submissions, bulk file uploads, or external data imports in one operation

## Example Flow: Import Employee Records

### Scenario
You receive a JSON array of employee records and want to insert them all into the `employee_table`.

### Flow Steps

**Fetch or Construct Variable**

**Variable:** `employee_data_list`

**Value:**
```
[
  { "emp_name": "Alice", "department": "Sales" },
  { "emp_name": "Bob", "department": "HR" }
]
```

## Insert Multiple Row Node

**Entity Name:** `employee_table`

**Rows Variable:** `employee_data_list`

**Output Variable:**
- `insert_status` → `bulk_insert_result`

---

## Summary
The Insert Multiple Row node is your go-to solution for handling bulk data inserts efficiently. Just map your structured data to a variable and configure the destination table. The node handles the rest, ensuring smooth, multi-record entry into your workflow’s database.