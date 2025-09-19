### Node Guide: Send Document Data

---

#### Overview
The **Send Document Data** node is used to send downloadable document files to users.  
This is helpful when workflows involve reports, generated PDFs, policy files, analysis documents, or any relevant attachments.

---

#### What This Node Does
- Displays one or more **downloadable files** to the user  
- Includes a **summary/description** message above the document list  
- All data must be provided via **variables only**

---

#### Configuration Details

**1. Summary**  
- Select a variable from the dropdown list  
- This variable should contain a brief summary or context message about the document(s)  
  _Example: “Please find your reports below”_

**2. Data**  
- Select a variable that contains a **JSON array** of document metadata  
- Each object must include:

```json
{
  "fileId": "string",    // Unique identifier of the file stored in the system
  "source": "filename.pdf"  // File name that should be shown as downloadable
}
```

**Format**

```
[
  {
    "fileId": "",
    "source": "filename.pdf"
  }
]
```

![ :( Can't load image ](/qdocs/Agent_Nodes/Output_Nodes/Send_Document_Data/Send_Document_Data_Node_Image_1.png)

### Inputs
**Summary:** A variable with a short message to be shown above the file list  
**Data:** A variable with an array of files using the specified metadata structure

---

### Outputs
No variable outputs  
Renders a list of files with download links that the user can click to retrieve the documents

---

### When to Use
Use this node when you want to:

- Deliver dynamic reports or generated documents  
- Allow users to download PDFs, Word files, or other resources  
- Share outputs created earlier in the workflow, like contracts, analyses, or policies  

---

### Example Use Case
**Scenario:** Sharing Processed Reports After User Input  
**Setup:**

- **Summary variable:** `doc_summary`  
  _(e.g., “Your monthly reports are ready for download”)_  
- **Data variable:** `report_docs`

```
[
  {
    "fileId": "501",
    "source": "monthly_summary.pdf"
  },
  {
    "fileId": "502",
    "source": "transaction_log.pdf"
  }
]
```
### Summary
The **Send Document Data** node allows you to send files dynamically from your workflow. Use this when delivering attachments, reports, or files generated and stored during execution, while keeping the experience seamless and contextual.

Let me know if you want a similar guide for image or video delivery nodes.