### Node Guide: PDF To Vector

---

### Overview
The **PDF To Vector** node enables intelligent document processing by converting PDF files into **vector embeddings**. These embeddings power **semantic search**, **document Q&A**, and **Retrieval-Augmented Generation (RAG)** use cases by storing data in a vector database.

---

### What This Node Does
- Processes and chunks content from selected PDF documents  
- Converts those chunks into vector embeddings using an **embedding model**  
- Stores the vectors into a specified **collection** in your vector database  

---

### Inputs

This node is **configured via form fields**, not runtime inputs:
- Embedding model (required)
- Collection name
- Document source (DMS)
- Chunk size & overlap
- Indexing type
- Metadata fields

---

### Outputs

- **No direct output variables**  
- All embeddings are stored silently into the configured collection  
- Usable downstream in RAG-style queries, search, and Prompt LLM nodes  

---

### Configuration Details

#### 1. **Embedding Model**
- Select from available global embedding model configurations
(You must create a global configuration of type Embedding Model)
- **Required**

![ :( Can't load image ](/qdocs/Agent_Nodes/Vector_Management/PDF_To_Vector/PDF_To_Vector_Image_1.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Vector_Management/PDF_To_Vector/PDF_To_Vector_Image_2.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Vector_Management/PDF_To_Vector/PDF_To_Vector_Image_3.png)

#### 2. **Documents**
- Choose a globally defined **DMS configuration** as the source  
- Should point to one or more PDF files

![ :( Can't load image ](/qdocs/Agent_Nodes/Vector_Management/PDF_To_Vector/PDF_To_Vector_Image_4.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Vector_Management/PDF_To_Vector/PDF_To_Vector_Image_5.png)

#### 3. **Collection Name**
- Name of the vector store collection where embeddings will be saved  
- Can be static (typed) or dynamic (from variable)  

#### 4. **Chunk Size**
- Number of characters per chunk  
- Typical values: `500`, `1000`, `1500`  

#### 5. **Chunk Overlap**
- Number of overlapping characters between chunks  
- Preserves context across chunks  
- Example: 150 overlap for a 1000-character chunk  

#### 6. **Indexing Type**
- **Upsert**: Add/update only new content  
- **Re-Index**: Clear and reprocess entire collection  

#### 7. **Metadata Fields**
Select from options to attach as metadata with each vector:
- `Tags`  
- `File ID`  
- `File Name`  
- `File Size`  
- `File Extension`

![ :( Can't load image ](/qdocs/Agent_Nodes/Vector_Management/PDF_To_Vector/PDF_To_Vector_Image_6.png)

---

### When to Use

Use **PDF To Vector** when you want to:
- Build **semantic search** on top of your documents  
- Feed PDF knowledge into RAG-style applications  
- Power Q&A bots using embedded enterprise documents  
- Preprocess PDFs for LLM-based flows  

---

### Example Use Case

#### Scenario: Legal Document Knowledge Base

**Flow Steps:**
1. **Upload PDFs** to DMS  
2. **PDF To Vector Node**:
   - Embedding model: `OpenAI-Embedding-V3`
   - Collection name: `legal_docs_vector_store`
   - Chunk size: `1000`
   - Overlap: `200`
   - Indexing: `Upsert`
   - Metadata: `File Name`, `Tags`, `File ID`
3. **Prompt LLM Node** later uses this collection for question answering

---

### Summary

The **PDF To Vector** node is essential for document intelligence workflows. It embeds and stores PDF content as searchable vectors, making your documents ready for high-quality semantic retrieval and AI interaction.

Let me know if you’d like examples of chunk configuration, model comparison, or how to connect this with a retrieval-enabled Prompt LLM node.
