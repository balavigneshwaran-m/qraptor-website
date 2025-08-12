### Node Guide: Claim Description Similarity Checker

---

### Overview

The **Claim Description Similarity Checker** node is tailored for **insurance claim workflows**, offering a built-in mechanism to detect **duplicate or near-duplicate claim descriptions**. It uses semantic similarity analysis to compare a **new claim description** against historical claims and helps **prevent fraud or redundancy**.

---

### What This Node Does

- Analyzes the **claim description** text  
- Compares it with previously submitted claims (internal logic or vector store)  
- Flags descriptions that are **semantically similar**  
- Returns the similarity result into a **named variable** for use in downstream logic (e.g., approval, rejection, manual review)  

---

### Configuration Fields

#### 1. **Claim ID**
- Unique identifier for the current claim  
- Accepts static text or a variable like `{{claim_id}}`  
- Helps isolate the claim for comparison

#### 2. **Description**
- The actual text content describing the incident or damage  
- This is the **primary input for similarity checking**  
- Example: `"Rear-ended at a red light, minor scratches on bumper"`

#### 3. **User Name**
- Name of the person submitting the claim  
- May be used to scope comparison (e.g., avoid flagging other users’ similar descriptions)

#### 4. **Output Variable**
- Name of the variable to store the result  
- Example: `similarity_result`, `similarity_check_flag`  
- Used in conditional nodes downstream (e.g., for rejections)

---

### Inputs

| Input        | Type    | Description                                   |
|--------------|---------|-----------------------------------------------|
| Claim ID     | String  | Unique ID of the current claim                |
| Description  | String  | Text description of the incident              |
| User Name    | String  | Name of the claimant                          |

---

### Outputs

| Output Variable         | Description                                      |
|-------------------------|--------------------------------------------------|
| `similarity_result`     | Stores the result of the similarity check        |
| Possible Values         | `"similar"`, `"not_similar"` (may vary by setup) |

![ :( Can't load image ](/qdocs/Agent_Nodes/Claims_Processing/Claim_Description_Similarity_Checker/Claim_Description_Similarity_Checker.png)

---

### When to Use

Use this node when your workflow needs to:

- **Prevent multiple or duplicate claims** from the same user  
- **Flag fraudulent behavior** based on repetitive text entries  
- **Automate initial fraud screening** in claim intake processes  
- Ensure **claim uniqueness** before forwarding to processing or payment nodes  

---

### Example Flow: Detect Duplicate Claim Descriptions

**Scenario:**  
A user submits the following claim:  
> _"Rear-ended at a traffic light, minor bumper damage."_

You want to ensure this isn't a repeated or slightly altered copy of a previous submission.

**Steps:**

1. **Claim Description Similarity Checker Node**
   ```yaml
   Claim ID: {{claim_id}}
   Description: {{claim_description}}
   User Name: {{user_name}}
   Output Variable: similarity_check_result