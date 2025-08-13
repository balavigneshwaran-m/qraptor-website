# Node Guide: PPT(s) to MD(s)

## Overview

The **PPT(s) to MD(s)** node allows you to **convert multiple PowerPoint files** (.ppt or .pptx) into **Markdown format** in one go.  
Instead of processing each presentation manually, this node automates the conversion of every slide deck in a specified source folder and saves the Markdown versions into a destination folder.

This is ideal for transforming presentations into text-friendly formats for documentation, bots, or knowledge bases.

---

## How It Works

When triggered:

1. Scans the specified **Source Folder**
2. Finds all **PowerPoint files** (.ppt or .pptx)
3. Converts each file into **Markdown format**
4. Saves each result in the **Destination Folder** as a `.md` file

---

## Configuration Details

### Source Folder ID

- Make a folder inside Data Vault that contains all the Powerpoint files

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/PPT(s)_To_MD(s)/PPT(s)_To_MD(s)_Image_1.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/PPT(s)_To_MD(s)/PPT(s)_To_MD(s)_Image_2.png)

- Make a global configuration of type DMS Upload and select this folder.

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/PPT(s)_To_MD(s)/PPT(s)_To_MD(s)_Image_3.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/PPT(s)_To_MD(s)/PPT(s)_To_MD(s)_Image_4.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/PPT(s)_To_MD(s)/PPT(s)_To_MD(s)_Image_5.png)

- Choose this particular global configuration in the node as the source. 
- All `.ppt` or `.pptx` files in this folder will be processed

### Destination Folder ID

- Make a folder inside Data Vault where you want to store all md files converted from PPT.

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/PPT(s)_To_MD(s)/PPT(s)_To_MD(s)_Image_6.png)

- Make a global configuration of type DMS Upload and select this folder.

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/PPT(s)_To_MD(s)/PPT(s)_To_MD(s)_Image_7.png)

- Choose this particular global configuration in the node as the destination.
- Each file will be saved as a separate `.md` file named after the original presentation

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/PPT(s)_To_MD(s)/PPT(s)_To_MD(s)_Image_8.png)

---

## Inputs

- **Source Folder ID**  
  Folder containing the PPT files to convert

---

## Outputs

- **Destination Folder ID**  
  Folder where the generated Markdown files will be saved

---

## When to Use

Use the **PPT(s) to MD(s)** node when:

- You want to **automatically convert multiple presentations**
- You need **slide content** available in plain-text or Markdown
- You are managing **recurring decks** for documentation, chatbots, or internal portals

---

## Example Flow: Convert Training Decks to Markdown

### Scenario

You receive a folder full of training presentations every month. You want to extract their content into Markdown for uploading to your internal knowledge base.

### Flow Steps

1. **PPT(s) to MD(s) Node**  
   - **Source Folder**: `Training Presentations`  
   - **Destination Folder**: `Training Docs (Markdown)`

2. **Next Step (Optional)**  
   - Upload converted Markdown to a knowledge base  
   - Notify content reviewers  
   - Trigger documentation updates

---

## Summary

- **Converts all PPT files in a folder to Markdown**
- **Saves results** in a clean, structured format for further use
- Perfect for automating slide-to-text transformation in scalable workflows