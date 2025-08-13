# Node Guide: PDF to Markdown

## Overview

The **PDF to Markdown** node is used to **convert the contents of a PDF file into Markdown format**.  
This is helpful when you need structured, readable text from a PDF for use in:

- Emails  
- Chat messages  
- Document storage  
- Further automation steps

The converted content is stored in a variable for use in later parts of the workflow.

---

## How It Works

When this node is triggered:

- It reads the PDF using the provided **Document ID**
- It **converts the content** into **Markdown format**
- It saves the result to a **variable**, which you can use in the next steps

---

## Configuration Details

###  Document ID

You must provide the **ID of the PDF document** to convert. This can be:

- A **manually typed** ID (e.g., `"doc_12345"`)
- A **variable** containing the document ID

This is the id of the document which you have Made in Data Vault.

This mainly should be referenced from a variable as in a complete end to end flow the doucment Id will be stored
inside a table or it would be dynamically made.

###  Output Variable

- Define a **variable** to store the Markdown result  
- You can reuse this variable in:
  - Email or message templates  
  - Display components  
  - File storage steps

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/PDF_To_Markdown/PDF_to_Markdown_Image_1.png)

---

## Inputs

- **Document ID**:  
  A static string or variable that identifies the PDF file to convert

---

## Outputs

- **Markdown Content (Variable)**:  
  The node returns the **converted Markdown text** stored in a variable

---

## When to Use

Use this node when:

- You need to **extract readable content** from a PDF
- You want to **display or send** the document content in **text-based format**
- You need to **reuse PDF content** in other messaging or automation steps

---

## Example Flow: Convert and Share PDF Summary

### Scenario

A user uploads a PDF report, and you want to extract the text and send it via Teams or email.

### Flow Steps

1. **Upload or Receive PDF**  
   - Capture the PDF document and get its ID (e.g., from a file upload node)

2. **PDF to Markdown Node**  
   - Input the document ID  
   - Store output in a variable like `pdfSummary`

3. **Send Message Node**  
   - Use the `pdfSummary` variable to send a formatted summary to the user

---

## Summary

- Converts PDFs into **Markdown for easy reuse**
- Accepts a **document ID** as input
- Produces clean, formatted text that can be **shared or stored**
- Ideal for document previews, summaries, or communication