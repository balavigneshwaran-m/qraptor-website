# Node Guide: PDF(s) to MD(s)

## Overview

The **PDF(s) to MD(s)** node is used to **bulk convert multiple PDF files into Markdown format**.  
Instead of processing one file at a time, this node reads **all PDFs in a source folder** and outputs a corresponding `.md` file for each into a **destination folder**.

This is especially useful when automating content transformation for editors, chat interfaces, or documentation tools.

---

## How It Works

When the node is triggered:

1. Looks inside the **Source Folder**
2. Reads all **PDF files** inside
3. Converts each PDF to a **Markdown (.md)** file
4. Saves the converted files in the **Destination Folder**

---

## Configuration Details

###  Source Folder ID

- Make a folder inside Data Vault that contains all the Pdf files

![ :( Can't load image ](/Agent_Nodes/Document_AI/PDF(s)_To_MD(s)/PDF(s)_To_MD(s)_Image_1.png)

![ :( Can't load image ](/Agent_Nodes/Document_AI/PDF(s)_To_MD(s)/PDF(s)_To_MD(s)_Image_2.png)

- Make a global configuration of type DMS Upload and select this folder.

![ :( Can't load image ](/Agent_Nodes/Document_AI/PDF(s)_To_MD(s)/PDF(s)_To_MD(s)_Image_3.png)

![ :( Can't load image ](/Agent_Nodes/Document_AI/PDF(s)_To_MD(s)/PDF(s)_To_MD(s)_Image_4.png)

![ :( Can't load image ](/Agent_Nodes/Document_AI/PDF(s)_To_MD(s)/PDF(s)_To_MD(s)_Image_5.png)

- Choose this particular global configuration in the node as the source. 
- All `.pdf` files found here will be processed

###  Destination Folder ID

- Make a folder inside Data Vault where you want to store all md files converted from PDF.

![ :( Can't load image ](/Agent_Nodes/Document_AI/PDF(s)_To_MD(s)/PDF(s)_To_MD(s)_Image_6.png)

- Make a global configuration of type DMS Upload and select this folder.

![ :( Can't load image ](/Agent_Nodes/Document_AI/PDF(s)_To_MD(s)/PDF(s)_To_MD(s)_Image_7.png)

- Choose this particular global configuration in the node as the destination.
- Each Markdown file will be named after its corresponding PDF

![ :( Can't load image ](/Agent_Nodes/Document_AI/PDF(s)_To_MD(s)/PDF(s)_To_MD(s)_Image_8.png)

---

## Inputs

- **Source Folder ID**  
  The folder containing the PDF files to convert

---

## Outputs

- **Destination Folder ID**  
  The folder where the generated `.md` files will be saved

---

## When to Use

Use the **PDF(s) to MD(s)** node when:

- You need to **convert multiple PDFs at once**
- You want to **automate document formatting** for chat, email, or websites
- You work with **batch reports or archives** that need to be made text-friendly

---

## Example Flow: Bulk Convert Monthly Reports

### Scenario

Your system receives multiple PDF reports each month in a shared folder.  
You want to convert all of them into Markdown format for easy integration into dashboards or email digests.

### Flow Steps

1. **PDF(s) to MD(s) Node**  
   - **Source Folder**: `Monthly Reports (PDF)`  
   - **Destination Folder**: `Monthly Reports (Markdown)`

2. **Follow-up Node (Optional)**  
   - Process the new `.md` files  
   - Send a notification, or archive the Markdown versions

---

## Summary

- **Bulk-converts all PDFs** in a folder into Markdown format  
- Stores the results in a **designated destination folder**  
- Ideal for **automated document processing** and scalable content formatting workflows