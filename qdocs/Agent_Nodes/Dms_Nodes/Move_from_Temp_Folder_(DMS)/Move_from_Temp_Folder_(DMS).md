# Node Guide: Move from Temp Folder (DMS)

## Overview
The **Move from Temp Folder** node is used to transfer files from a temporary folder (commonly used when files are uploaded via channels like WhatsApp, Teams, or Super Agents) into a permanent folder within the **Data Vault**.  
This allows for better organization and long-term access to the uploaded files.

## What This Node Does

- Moves a file from the temporary folder to a user-defined permanent folder  
- Renames the file (if needed)  
- Returns the status of the move operation  

This is useful for storing documents in an organized way after receiving them via automated channels.

## Configuration

You need to configure the following:

### 1. File ID
- Select the variable from the dropdown that holds the unique ID of the file uploaded to the temporary folder

### 2. Destination File Name
- Select the variable from the dropdown which contains the name you want the file to have after it is moved

### 3. Folder ID
- Select the variable from the dropdown that holds the ID of the destination folder where the file should be moved

> All three inputs must be selected from existing variables in your agent — no manual typing.

![ :( Can't load image ](/qdocs/Agent_Nodes/Dms_Nodes/Move_from_Temp_Folder_(DMS)/Move_from_Temp_Folder_(DMS)_Node_Image_1.png)

## Inputs

- `file_id` — File uploaded to the temp folder  
- `destination_file_name` — New name for the file  
- `folder_id` — Target folder ID in the Data Vault  

## Output

- `status` — The result of the move operation (can be captured into a variable)

## When to Use

Use this node when:

- A file is uploaded to the temporary folder via platforms like WhatsApp, Teams, or other integrations  
- You want to move the file to a structured, permanent folder in the Data Vault  
- You need to rename the file as it's being moved  
- You want to organize files based on user sessions, uploads, or ticket IDs

## Example Flow: Storing Uploaded Document from WhatsApp

### Scenario
A user uploads a document via WhatsApp. The document is stored in the temp folder. You want to:

- Move the file to a folder named after the user  
- Rename the file  
- Capture the operation status  

### Flow Steps

1. **File is uploaded** by the user via WhatsApp  
   - Captured in a variable: `file_id`

2. **Create Folder Node**
   - Creates a folder named after the user (e.g., `{{user_id}}_folder`)
   - Captures `folder_id` in a variable

3. **Move from Temp Folder Node**
   - `File ID` → Select the `file_id` variable  
   - `Destination File Name` → Select a variable like `destination_file_name`  
   - `Folder ID` → Select the `folder_id` variable  
   - **Output**: Capture `status` in a variable

## Summary

The **Move from Temp Folder** node helps transition files from temporary storage to structured folders in the Data Vault, supporting cleaner document management and seamless user workflows.