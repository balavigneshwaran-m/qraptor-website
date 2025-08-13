# Node Guide: Excel(s) to MD(s)

## Overview

The **Excel(s) to MD(s)** node allows you to **automatically convert multiple Excel files** (.xls or .xlsx) into **Markdown (MD)** format.  
It scans a specified **source folder**, processes all the Excel files inside, and saves the Markdown output into a **destination folder**.

Perfect for converting spreadsheet data into text-friendly formats for documentation, chat platforms, or publishing systems.

---

## How It Works

When triggered:

1. Reads all Excel files in the **Source Folder**  
2. Converts each file into a **Markdown table or text**  
3. Saves the converted content as `.md` files in the **Destination Folder**

---

## Configuration Details

###  Source Folder ID

- Make a folder inside Data Vault that contains all the Excel files

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_1.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_2.png)

- Make a global configuration of type DMS Upload and select this folder.

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_3.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_4.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_5.png)

- Choose this particular global configuration in the node as the source. 
- The node will scan this folder for `.xls` or `.xlsx` files

###  Destination Folder ID

- Make a folder inside Data Vault where you want to store all md files converted from Excel.

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_6.png)

- Make a global configuration of type DMS Upload and select this folder.

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_7.png)

- Choose this particular global configuration in the node as the destination.
- Each `.md` file corresponds to one Excel document

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_8.png)

---

## Inputs

- **Source Folder ID**  
  Folder where Excel files are stored for conversion

---

## Outputs

- **Destination Folder ID**  
  Folder where the resulting Markdown files will be stored

---

## When to Use

Use this node when you want to:

- Convert structured spreadsheet data into Markdown tables
- Share Excel data in chat, documentation, or emails
- Automate conversion of multiple Excel files for downstream processing

---

## Example Flow: Auto-Publish Reports

### Scenario

You receive daily performance metrics in Excel format. You want to convert them to Markdown and post them in your team’s messaging tool.

### Flow Steps

1. **Excel(s) to MD(s) Node**  
   - **Source Folder**: `Daily Reports (Excel)`  
   - **Destination Folder**: `Daily Reports (MD)`

2. **Optional Next Step**  
   - Use a **Send Email** or **Teams Message** node to share the converted Markdown content

---

## Summary

- **Batch converts Excel files into Markdown**
- Outputs are saved in a clean, readable `.md` format
- Ideal for reporting, automation, and structured message formatting