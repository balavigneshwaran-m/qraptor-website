# Node Guide: Insert Row

## Overview

The **Insert Row** node enables you to **add a new record** into a selected database table (entity) within your workflow.  
It supports inserting static values or values pulled from agent variables, allowing flexible and dynamic data entry.

## What This Node Does

● Inserts a single row into a specified table  
● Allows each column value to be configured using static values or dynamic variables  

**Returns:**

● `insert_status`: Success or failure of the operation  
● `primary_key`: The primary key (usually auto-generated) of the inserted row  

## Configuration Details

### 1. Table Name (Entity Name)

● Mandatory  
● Select the table (entity) from a dropdown list of available tables in your environment

![ :( Can't load image ](/qdocs/Agent_Nodes/Data_Management/Insert_Row/Insert_Row_Image_1.png)

### 2. Column Values

Once a table is selected, all its columns are shown  

For each column, you can:

● Enter a static value, or  
● Select a variable from the dropdown to provide the value dynamically  

You can mix static and dynamic values across different columns

![ :( Can't load image ](/qdocs/Agent_Nodes/Data_Management/Insert_Row/Insert_Row_Image_2.png)

## Inputs

● **Table Name**: Select from dropdown (mandatory)  
● **Column Values**:  
   ● Set per column  
   ● Accepts typed values or variable selections  

## Outputs

● `insert_status`:  
   ● Capture into a variable to track whether the insert was successful or failed  

● `primary_key`:  
   ● Capture into a variable to store the newly created record’s primary key (auto-generated ID)  

## When to Use

Use this node when you want to:

● Add user-submitted or dynamically generated data into a specific table

● Store intermediate or final outputs of your workflow into persistent storage

● Log transactions, actions, or inputs as records in your database


## Example Flow: Save User Submission

### Scenario

You’re collecting user details through a form and want to insert the information into the `user_profiles` table.

### Flow Steps

1. **User Input Form Node**

   ● Collects fields like `name`, `email`, and `user_id`  
   ● Values stored in variables: `user_name`, `user_email`, `user_id`

2. **Insert Row Node**

   ● Table Name: `user_profiles`  
   ● Column name: Select `user_name`  
   ● Column email: Select `user_email`  
   ● Column external_id: Select `user_id`  
   ● Capture `insert_status` in `record_status`  
   ● Capture `primary_key` in `record_id`  

## Summary

The **Insert Row** node is an efficient, no-code interface for inserting single records into your data tables.  
By supporting both static and dynamic input, it integrates seamlessly with form inputs, generated data, and conditional workflows.  
It’s essential for workflows that involve **data logging, user profiling, and storing structured information**.