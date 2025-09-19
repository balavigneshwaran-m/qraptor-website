# Node Guide: Prompt Your LLM

## Overview

The **Prompt Your LLM** node enables direct interaction with a **Large Language Model (LLM)** within your workflow.  
You can manually write a custom prompt, use predefined snippets, or generate prompts using natural language.  
The LLM’s response is captured in a variable and can be used in subsequent steps of your automation.

---

## What This Node Does

- Sends a **text prompt** to the connected LLM
- Supports **variable injection** using `{variable_name}` syntax
- Returns the **LLM-generated output**
- Offers a **Test Prompt** feature to preview responses before running the flow

---

## Configuration Details

###  1. LLM Configuration (Required)

- Choose a **Multimodal LLM** from the global configurations
- Defines which language model generates the final answer
- Must be pre-configured in the **Global Configurations** page

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/Prompt_your_llm/Prompt_your_llm_image_1.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/Prompt_your_llm/Prompt_your_llm_image_2.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/Prompt_your_llm/Prompt_your_llm_image_3.png)

###  2. Memory Settings

- **Memory Size:** Number of past interactions to reference
- **Memory Type:**
  - **Agent Memory:** Context scoped to current flow
  - **Global Memory:** Context shared across flows

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/Prompt_your_llm/Prompt_your_llm_image_4.png)

###  3. Prompt Input

- Manually type your prompt
- Use variables by referencing them in `{}` format  
  **Example:**  
  `Summarize the customer feedback for the user with ID: {user_id}`

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/Prompt_your_llm/Prompt_your_llm_image_5.png)

###  4. Prompt Snippets (Optional)

- Browse and select from a library of reusable prompts
- Good starting point for common tasks like summarization, classification, etc.

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/Prompt_your_llm/Prompt_your_llm_image_10.png)

###  5. AI-Generated Prompts (Optional)

- Type a description of what you want the prompt to do
- Click **Generate** to auto-create a prompt using an LLM

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/Prompt_your_llm/Prompt_your_llm_image_6.png)

###  6. Prompt Testing

- Use the **Test Prompt** button to preview the LLM output
- Helps you fine-tune prompts without running the full flow

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/Prompt_your_llm/Prompt_your_llm_image_7.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/Prompt_your_llm/Prompt_your_llm_image_8.png)

---

## Inputs

- **Prompt**  
  A text string with embedded variables, e.g.,  
  `Summarize the following review: {customer_review}`

---

## Outputs

- **LLM Output**  
  The model’s text response  
  Store it in a variable (e.g., `response_text`) for downstream use

  ![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/Prompt_your_llm/Prompt_your_llm_image_9.png)

---

## When to Use

Use this node when you need to:

- Summarize, rephrase, or classify text
- Generate dynamic content (e.g., emails, messages, titles)
- Extract insights from text using LLM reasoning
- Support business logic with language understanding

---

## Example Flow: Generate Summary of User Input

### Scenario

A user submits feedback, and you want to summarize it in two lines.

### Flow Steps

1. **Prompt Your LLM Node**

   - **Prompt:**  
     `Summarize the following feedback in two lines: {user_feedback}`
   - **Output Variable:**  
     `feedback_summary`

2. **Send Text Node**

   - **Message:**  
     `Here’s the summary: {{feedback_summary}}`

---

## Summary

The **Prompt Your LLM** node brings natural language understanding directly into your flow.  
With flexible prompt design, variable support, and real-time testing, it allows you to:

- Generate context-aware responses
- Automate content transformation
- Improve interaction quality with dynamic LLM-powered logic