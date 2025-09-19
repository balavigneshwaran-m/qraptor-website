# Node Guide: RAG Agent

## Overview

The **RAG Agent (Retrieval-Augmented Generation Agent)** empowers workflows to retrieve relevant information from a **vector database** and generate **LLM-powered answers** based on that content.  
By combining similarity-based document retrieval with natural language generation, this node enables precise and grounded responses to user questions.

---

## What This Node Does

- Performs **similarity search** on a vector database to find relevant document chunks
- Applies **filtering thresholds** based on similarity scores
- Sends results to a **selected LLM** for summarization and response generation
- Supports **memory-aware conversations** (Agent or Global)
- Can include **metadata** such as file name, size, and type in the output

---

## Configuration Details

###  1. LLM Configuration (Required)

- Choose a **Multimodal LLM** from the global configurations
- Defines which language model generates the final answer
- Must be pre-configured in the **Global Configurations** page

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/RAG_Agent/RAG_image_1.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/RAG_Agent/RAG_image_2.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/RAG_Agent/RAG_image_3.png)

---

###  2. Memory Settings

- **Memory Size:** Number of past interactions to reference
- **Memory Type:**
  - **Agent Memory:** Context scoped to current flow
  - **Global Memory:** Context shared across flows

---

###  3. Embedding Model (Required)

- Select an embedding model to vectorize content and user queries
- Must be pre-configured under **Embedding Configs** in the Global Settings

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/RAG_Agent/RAG_image_4.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/RAG_Agent/RAG_image_5.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/RAG_Agent/RAG_image_6.png)

---

###  4. Query and Search Settings

- **Query:** User question (static or from variable, e.g., `{{user_question}}`)
- **Collection Name:** Name of the vector DB collection to search (`{{collection_name}}`)

**Note:**  
The **MD to Vector** or **PDF To vector** node converts markdown content into vector embeddings.  
These embeddings are stored inside a **collection**.  
While configuring the **RAG Agent**, you must provide the **same collection name** so the agent can retrieve and use the stored vector content effectively.  


- **Similarity Search K Value:** Number of top results to return (default: `1`)
- **Similarity Score Threshold:** Min similarity (0.0–1.0; default: `0.3`)

---

###  5. Metadata Fields (Optional)

- Add metadata fields to the output for additional context
- Options include:
  - File Name
  - File ID (default)
  - File Extension
  - File Size

---

###  6. Output Storage

- Store the final generated result in a variable
- Example: `{{rag_response}}`

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/RAG_Agent/RAG_image_7.png)

---

## Inputs

| Input                     | Description                                           |
|--------------------------|-------------------------------------------------------|
| **Query**                | The user question (`{{query}}`)                       |
| **Collection Name**      | Vector DB collection to search (`{{collection_name}}`)|
| **Similarity K Value**   | Number of chunks to retrieve (e.g., `3`)              |
| **Similarity Threshold** | Min similarity score (e.g., `0.7`)                    |
| **Metadata Fields**      | Optional file details (e.g., File Name, File Size)    |
| **LLM Configuration**    | Selected LLM configuration (Required)                 |
| **Embedding Model**      | Selected embedding config (Required)                  |
| **Memory Scope**         | Agent or Global                                       |
| **Memory Size**          | Number of past steps for context                      |

---

## Outputs

| Output Name       | Description                                                  |
|------------------|--------------------------------------------------------------|
| **Summarized Answer** | Final LLM response based on retrieved content         |
| **Metadata Fields**   | If configured, included alongside the answer          |
| **Output Variable**   | Custom variable for downstream usage (e.g., `{{rag_response}}`) |

---

## When to Use

Use the **RAG Agent** when you want to:

- Enable **Q&A over internal documents** (PDFs, MD files, policies)
- Allow users to ask **natural language questions** grounded in your content
- Build **knowledge retrieval tools** for support, HR, legal, or compliance
- Improve **factual accuracy** in LLM outputs using enterprise data
- Power **intelligent chatbots** or virtual assistants using long-form documents

---

## Example Flow: Insurance Document Query

### Scenario

A user asks:  
**"What’s the cooling period for new health insurance plans?"**  
The vector database contains embedded content from insurance PDFs.

### Flow Steps

1. **RAG Agent Node**

   - **LLM Config:** `multi-modal-gpt4`
   - **Embedding Config:** `insurance-embedder`
   - **Query:** `{{user_question}}`
   - **Collection Name:** `health_insurance_vectors`
   - **Similarity K:** `3`
   - **Threshold:** `0.7`
   - **Metadata Fields:** File Name, File Size
   - **Output Variable:** `{{insurance_answer}}`

2. **Send Text Node**

   - **Message:** `"Here’s what I found: {{insurance_answer}}"`

---

## Summary

The **RAG Agent Node** is a powerful building block for knowledge-intensive applications.  
It grounds generative AI in your private content, enabling:

- Intelligent document search  
- Factual Q&A  
- Enterprise-grade assistants  
- Contextual summarization  

Whether you're enhancing support systems or powering internal copilots, RAG bridges retrieval and generation for smart, reliable answers.