# Node Guide: Entity Extraction

## Overview

The **Entity Extraction** node is used to **extract structured information (entities)** from unstructured text using a configured LLM (Large Language Model).  
It supports referencing previous conversation memory and allows live testing to preview what will be extracted.

This node is ideal when you want to **automate data extraction** from inputs like messages, support queries, or emails.

---

## What This Node Does

- Extracts **entities** from a block of text  
- Uses **LLM intelligence** for smart identification of key values  
- Can reference **Agent or Global memory** for additional context  
- Supports **live preview** and testing before runtime

---

## Inputs

This node requires the following inputs:

- **Content**: The unstructured text to extract entities from (from a variable)
- **LLM Configuration**: A required selection from global LLM configurations
- **Memory Limit**: How many past messages to consider for context
- **Memory Scope**: Choose between `Agent Memory` or `Global Memory` for contextual references

---

## Outputs

- **Extracted Entities**: A variable containing the structured results
- **Entities Extracted Count**: Number of entities successfully extracted
- **All Entities Extracted (Yes/No)**: Indicates whether all targeted entities were found

---

## Configuration

###  LLM Configuration

- **Required** to select an LLM configuration of type **Multimodal** or **Text Model** from **Global Configurations**
- Drives the extraction process based on LLM capabilities

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/Entity_Extraction/Entity_Extraction_Image_1.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/Entity_Extraction/Entity_Extraction_Image_2.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/Entity_Extraction/Entity_Extraction_Image_3.png)

###  Memory Settings

- **Memory Limit**: Number of recent turns to use for contextual understanding  
- **Memory Scope**:  
  - `Agent Memory`: Limited to the current session  
  - `Global Memory`: Broader and persistent memory

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/Entity_Extraction/Entity_Extraction_Image_4.png)

###  Content Selection

- Choose the input variable containing the text to analyze  
- This is the actual content from which entities will be pulled

###  Configure Extraction (Optional, but Powerful)

Click **"Configure Extraction"** to:

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/Entity_Extraction/Entity_Extraction_Image_5.png)

1. Paste or type a sample content block  
2. Specify which **entities** you want to extract (e.g., name, issue_type, product)

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/Entity_Extraction/Entity_Extraction_Image_6.png)

3. Add **instructions or constraints** (e.g., format rules, ignore specific phrases)  
4. Click **Test Extraction** to preview how the model will behave at runtime

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/Entity_Extraction/Entity_Extraction_Image_7.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Document_AI/Entity_Extraction/Entity_Extraction_Image_8.png)

---

## Example Flow: Extract Customer Support Info

### Scenario

You want to extract a customer's name, issue type, and product from their support message.

### Flow Steps

1. **Entity Extraction Node**  
   - **Input**: `{{support_message}}`  
   - **Entities to extract**: `name`, `issue_type`, `product`  
   - **LLM Config**: `Default-OpenAI-Config`  
   - **Memory**: Last 5 turns from `Agent Memory`  
   - **Outputs**:
     - `extracted_data`  
     - `entity_count`  
     - `extraction_status`

2. **Condition Node**  
   - Check if `extraction_status == "yes"`

3. **Update Row Node**  
   - Store `extracted_data` into a support ticket database

---

## When to Use

Use the Entity Extraction node when:

- You need to **pull structured data** from unstructured input (like messages or documents)
- You want **LLM-powered extraction** instead of keyword matching
- You need to **test and refine** extraction before going live
- You want to automate **routing, storage, or logic** based on extracted values

---

## Summary

- Smart entity extraction using LLMs  
- Supports memory for better contextual understanding  
- Live preview for easy testing  
- Ideal for workflows involving **messages, tickets, requests, or forms**  
- Outputs are stored in variables for use in later steps