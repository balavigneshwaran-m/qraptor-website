# Node Guide: Create Folder (DMS)

## Overview
The Create Folder (DMS) node is used to create a new folder in your Document Management System (DMS) storage space.  
This helps structure and organize workflow files like user uploads, claim documents, reports, etc., into dynamically created folders.

## What This Node Does

- Creates a folder in the DMS at a defined location
- Uses a folder name selected from a variable
- Returns:
  - `folder_id` — unique identifier for the created folder
  - `status` — status of the folder creation

This is especially useful when you want to create folders per user, case, or request to manage files cleanly.

## Configuration Details

### 1. Folder Name
- Must be selected from a variable via dropdown
- Static typing is not allowed
- Example variable: `folder_name` (value could be `{{user_id}}_folder`)

![ :( Can't load image ](/qdocs/Agent_Nodes/Dms_Nodes/Create_Folder_DMS/Create_Folder_Dms_Node_Image_4.png)

### 2. DMS Configuration
- Select from a list of predefined DMS Configs created in Global Configurations
- Determines where the folder will be created in your storage hierarchy

![ :( Can't load image ](/qdocs/Agent_Nodes/Dms_Nodes/Create_Folder_DMS/Create_Folder_Dms_Node_Image_1.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Dms_Nodes/Create_Folder_DMS/Create_Folder_Dms_Node_Image_2.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Dms_Nodes/Create_Folder_DMS/Create_Folder_Dms_Node_Image_3.png)

## Inputs

- `folder_name` (select from variable dropdown)
- `dms_config` (select from global configuration dropdown)

## Outputs

- `folder_id` — The unique ID of the folder (can be captured into a variable)
- `status` — Indicates success or failure (can be captured into a variable)

## When to Use

Use this node when you want to:

- Organize workflow output into dynamically named folders
- Store files per user, project, task, or submission
- Build hierarchical document structures on the fly

## Example Flow: Create Folder for User Uploads

### Scenario
A user submits a form with files attached. You want to create a folder named after their ID and upload all the files into that folder.

### Flow Steps

**Create Folder Node**
- Folder Name: Select the `user_folder_name` variable
- DMS Config: Choose from the dropdown list of global DMS configurations
- Output: Capture `folder_id` in a variable called `upload_folder`

## Summary of the Flow

- The Create Folder node dynamically builds a storage folder using a variable-based name
- Other workflow nodes (upload, move, tag, etc.) can reference this folder for storing or organizing files
- Ensures each transaction or user flow maintains clean and isolated storage