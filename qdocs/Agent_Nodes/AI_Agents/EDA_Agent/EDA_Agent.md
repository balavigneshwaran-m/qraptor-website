# Node Guide: EDA Agent

## Overview

The **EDA Agent (Exploratory Data Analysis Agent)** enables intelligent analysis of **tabular data** using a **Large Language Model (LLM)**.  
By combining schema selection, few-shot learning, and custom instructions, the EDA Agent answers natural language questions with summaries, classifications, and visualizations.

---

## What This Node Does

- Connects to a selected **table** from the **Data Vault**
- Sends schema and data samples to the LLM
- Supports **few-shot examples** to guide response formatting
- Allows **custom instructions** to tailor the output
- Returns a **summary**, **classification**, and final **LLM response**

---

## Configuration Details

###  1. LLM Configuration (Required)

- Select from global **multimodal LLM configurations**
- Determines which model handles EDA queries

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_1.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_2.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_3.png)

---

###  2. Memory Settings

- **Memory Size:** Number of past turns to include as context
- **Memory Scope:**  
  - **Agent Memory** – Scoped to the current agent flow  
  - **Global Memory** – Shared across workflows

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_4.png)

---

###  3. EDA Configure

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_5.png)

#### a. Schema Designer

- **Table Selection:** Pick a Data Vault table

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_6.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_7.png)

- **AI Schema Generation:** Auto-detects schema from selected table

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_8.png)

- **Column Selection:** Choose only the relevant fields for analysis
- **Sample Record Count:** Number of records sent to the LLM (default: 1)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_14.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_15.png)


#### b. Few-Shot Designer

- **Purpose:** Teach the LLM by example
- **Example Count:** Choose how many Q&A pairs to include
- **AI-Generated Examples:** Use "Generate All from AI" for auto-fill
- **Manual Examples:** Add Q/A pairs with expected classification
- **Classification Tags:**  
  - Text  
  - Table  
  - Chart (bar, pie, line, wordcloud)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_9.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_10.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_11.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_12.png)

#### c. Custom Instructions

- Add custom formatting or rules for the LLM to follow
- Supports flow variables via `{{variable_name}}`
- **Example:** `Please sort all responses by descending value.`

---

## Inputs

- **LLM Configuration:** Selected global LLM config
- **Memory Size:** Number of turns
- **Memory Scope:** Agent or Global
- **User Query:** Natural language question (e.g., "Show age distribution")

---

## Outputs

- **Classification:** Response type (Text, Table, Chart)
- **Summary:** Short explanation or interpretation
- **Agent Result:** Full answer, including visualization structure

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/EDA_Agent/EDA_image_13.png)

Each output can be saved to a variable and used downstream.

---

## When to Use

Use the **EDA Agent** node when:

- You want to build **LLM-powered dashboards**
- You need **summarization or analysis** of structured data
- Users ask natural language questions about a dataset
- You want automated **visualizations** based on data patterns

---

## Example Flow: HR Data Analysis

### Scenario

The HR manager asks:  
**“What is the gender distribution of employees in the Sales department?”**

### Flow Steps

1. **EDA Agent Node**

   - **LLM Config:** `gpt4-enterprise`
   - **Table:** `employee_records`
   - **Sample Count:** `100`
   - **Few Shots:**  
     - **Q:** "Show age distribution of employees"  
     - **A:** "Pie chart with age ranges"  
     - **Classification:** Chart (pie)
   - **Output Variable:** `eda_result`

2. **Send Text Node**

   - **Message:** `"Here’s the breakdown: {{eda_result}}"`

---

## Summary

The **EDA Agent** node transforms tabular data into actionable insights using the power of LLMs.  
With schema selection, prompt training, and visualization support, it’s ideal for building:

- Conversational dashboards  
- Data analysis flows  
- Interactive reporting tools