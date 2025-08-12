# Node Guide: Send Text Data

## Overview
The **Send Text Data** node is used to display plain or styled text messages during a workflow execution.  
This message can be fully static, fully dynamic (from variables), or a mix of both — such as templated sentences that include variable values.

## What This Node Does

- Outputs a text message to the screen or interface  
- Allows full flexibility to:
  - Select variables from a dropdown  
  - Type static content  
  - Combine both using `{{variable_name}}` syntax  

## Configuration Details

### 1. Text Content
You can:

- Select variable(s) from a dropdown list — these are values stored during workflow execution  
- Type text manually — for fixed/static messages  
- Combine both

![ :( Can't load image ](/qdocs/Agent_Nodes/Output_Nodes/Send_Text_Data/Send_Text_Data_Node_Image_1.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Output_Nodes/Send_Text_Data/Send_Text_Data_Node_Image_2.png)

**Example:**  
`The user's name is {{user_name}} and their ID is {{user_id}}.`

This helps dynamically generate messages tailored to the context, input, or API responses.

## Inputs

- Variables selected from the dropdown  
- Manually typed text or templates using `{{variable}}` format  

## Outputs

- No downstream data output  
- Displays a styled or plain text message on the interface  

## When to Use

Use this node when you need to:

- Show confirmation messages  
- Display instructions or contextual information  
- Output values fetched from previous steps (e.g., API responses, user input, or calculated values)  
- Provide human-readable updates or logs  

## Example Use Cases

### Case 1: Display a Static Message
**Message:**  
`Operation completed successfully.`

- No variables used

### Case 2: Display Dynamic Message
**Message:**  
`Welcome, {{first_name}}!`

- `first_name` is selected from the list of available variables

### Case 3: Mixed Message with Logic
**Message:**  
`{{user_name}} submitted {{document_count}} documents.`

- Combines static text with multiple dynamic variables

## Summary

The **Send Text Data** node enhances user communication by rendering flexible and context-aware messages.  
Use it for feedback, logging, notifications, or general info — with full support for variables and templated syntax.