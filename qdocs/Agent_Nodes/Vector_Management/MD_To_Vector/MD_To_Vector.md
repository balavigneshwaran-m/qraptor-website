### Node Guide: MD To Vector

---

### Overview

The **MD To Vector** node allows you to process `.md` (Markdown) files by converting their content into **vector embeddings**. These vectors are stored in a **vector database collection** for downstream use in **semantic search**, **Q&A systems**, and **Retrieval-Augmented Generation (RAG)**.

---

### What This Node Does

- Reads Markdown documents from a configured DMS source  
- Chunks the content into manageable pieces  
- Embeds each chunk using a selected embedding model  
- Stores vector representations in a named collection within a vector store  

---

### Inputs

This node does **not take runtime inputs**, but uses the following **configuration fields**:

- Embedding model  
- Collection name  
- DMS document source  
- Chunk size and overlap  
- Indexing type  
- Metadata fields  

---

### Outputs

- **No output variables**  
- Embeddings are saved silently in the configured vector store collection  
- Usable later for vector-based retrieval or document Q&A flows  

---

### Configuration Details

#### 1. **Embedding Model**
- Select from available global embedding model configurations
(You must create a global configuration of type Embedding Model)  
- **Required**

![ :( Can't load image ](/qdocs/Agent_Nodes/Vector_Management/MD_To_Vector/MD_To_Vector_Image_1.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Vector_Management/MD_To_Vector/MD_To_Vector_Image_2.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Vector_Management/MD_To_Vector/MD_To_Vector_Image_3.png)

#### 2. **Documents**
- Select a global DMS configuration pointing to Markdown files  
- Only `.md` files are processed

![ :( Can't load image ](/qdocs/Agent_Nodes/Vector_Management/MD_To_Vector/MD_To_Vector_Image_4.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Vector_Management/MD_To_Vector/MD_To_Vector_Image_5.png)

#### 3. **Collection Name**
- Name of the target vector collection

#### 4. **Chunk Size**
- Sets how many characters go into each chunk  
- Example: `500`, `1000`, `1500`

#### 5. **Chunk Overlap**
- Number of overlapping characters between chunks  
- Helps preserve semantic continuity  
- Example: `150`

#### 6. **Indexing Type**
- **Upsert**: Adds new or updates existing chunks  
- **Re-Index**: Clears existing and re-embeds all files

#### 7. **Metadata Fields**
Optional metadata to attach to each vector:
- `Tags`  
- `File ID`  
- `File Name`  
- `File Size`  
- `File Extension`  

![ :( Can't load image ](/qdocs/Agent_Nodes/Vector_Management/MD_To_Vector/MD_To_Vector_Image_6.png)

---

### When to Use

Use the **MD To Vector** node if you want to:
- Turn Markdown documentation into a **semantic knowledge base**  
- Support **question answering** over `.md` content using RAG  
- Enable **LLM-powered search and retrieval** for `.md` files  
- Embed README, changelogs, or wikis for product or developer support bots  

---

### Example Use Case

#### Scenario: Index Developer Docs

**Steps:**
1. Markdown docs (e.g., `README.md`, `api-guide.md`) uploaded into DMS  
2. **MD To Vector node** processes the files with config:
   - Model: `OpenAI-Embed`
   - Collection: `dev_docs`
   - Chunk size: `1000`, Overlap: `150`
   - Metadata: `File Name`, `Tags`
   - Indexing type: `Upsert`
3. Vectors are stored and retrieved later in a Prompt LLM node for querying developer help

---

### Summary

The **MD To Vector** node enables you to convert Markdown files into searchable embeddings. It supports robust configurations for chunking, metadata, and model selection — perfect for building intelligent knowledge workflows.

Let me know if you’d like guides for:
- **HTML To Vector**
- **DOCX To Vector**
- **TXT To Vector**
- Or a comparison table of all "To Vector" nodes.