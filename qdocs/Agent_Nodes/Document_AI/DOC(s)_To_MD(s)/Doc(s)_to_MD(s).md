# Node Guide: Doc(s) to MD(s)

## Overview

The **Doc(s) to MD(s)** node is designed to convert **multiple Word documents** (.doc or .docx) into **Markdown (MD)** format automatically.  
Rather than converting documents manually, this node processes every file in a specified **source folder** and saves the Markdown versions in a **destination folder**.

Ideal for workflows involving **content reuse**, **publishing**, or **integration** into text-based environments.

---

## How It Works

When triggered:

1. Scans the **Source Folder** for `.doc` or `.docx` files  
2. Converts each Word file into **Markdown format**  
3. Saves each `.md` file in the **Destination Folder**

---

## Configuration Details

###  Source Folder ID

- Make a folder inside Data Vault that contains all the Doc files

![ :( Can't load image ](/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_1.png)

![ :( Can't load image ](/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_2.png)

- Make a global configuration of type DMS Upload and select this folder.

![ :( Can't load image ](/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_3.png)

![ :( Can't load image ](/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_4.png)

![ :( Can't load image ](/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_5.png)

- Choose this particular global configuration in the node as the source. 
- All `.doc` or `.docx` files inside will be picked up for conversion

###  Destination Folder ID

- Make a folder inside Data Vault where you want to store all md files converted from Documents.

![ :( Can't load image ](/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_6.png)

- Make a global configuration of type DMS Upload and select this folder.

![ :( Can't load image ](/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_7.png)

- Choose this particular global configuration in the node as the destination.
- Each Markdown file will be named after the original document

![ :( Can't load image ](/Agent_Nodes/Document_AI/DOC(s)_To_MD(s)/Doc(s)_To_MD(s)_Image_8.png)

---

## Inputs

- **Source Folder ID**  
  Folder containing the Word files to convert

---

## Outputs

- **Destination Folder ID**  
  Folder where the converted Markdown files will be saved

---

## When to Use

Use the **Doc(s) to MD(s)** node when:

- You want to **automate the conversion** of Word documents
- You need to **publish content** in tools that support Markdown
- You're building a **knowledge base**, chatbot, or help system

---

## Example Flow: Publishing Internal Docs

### Scenario

Your internal teams create SOPs and guides in Microsoft Word. You want to convert them into Markdown for your help center.

### Flow Steps

1. **Doc(s) to MD(s) Node**  
   - **Source Folder**: `Internal SOPs (Docs)`  
   - **Destination Folder**: `Knowledge Base (Markdown)`

2. **Optional Next Steps**  
   - Review the Markdown files  
   - Upload to a CMS or documentation site  
   - Notify the content team

---

## Summary

- **Batch converts Word documents to Markdown**
- Saves the output in a designated folder
- Enables better integration with Markdown-based platforms and tools