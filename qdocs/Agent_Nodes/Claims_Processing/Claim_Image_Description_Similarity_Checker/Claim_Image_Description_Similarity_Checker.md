### Node Guide: Claim Image Description Similarity Checker

---

### Overview

The **Claim Image Description Similarity Checker** node is designed to validate whether a **claim's textual description aligns with its uploaded media** (e.g., photos of damage or incident scenes). This semantic cross-check adds a layer of **AI-powered consistency verification** that enhances fraud prevention and automates claim filtering.

---

### What This Node Does

- Accepts a **Claim ID**, **media folder**, **user information**, and **claim description**  
- Uses AI to analyze the visual content and match it against the written description  
- Returns a **similarity score** or **binary match result** stored in a variable  
- Enables downstream actions like auto-approval, rejection, or manual review

---

### Configuration Fields

#### 1. **Claim ID**
- Unique identifier for the claim
- Example: `{{claim_id}}`

#### 2. **Folder ID**
- ID of the folder containing **uploaded images or media**
- These files are used to evaluate visual evidence
- Example: `{{media_folder_id}}`

#### 3. **User Name**
- Name of the claimant
- Used for audit trails and user-level validation
- Example: `{{user_name}}`

#### 4. **Description**
- User-provided text explaining the incident
- Compared semantically with visual evidence
- Example: `{{claim_description}}`

#### 5. **Output Variable**
- Stores the result of the match check
- Example: `description_match_result`
- Output types:
  - `"matched"` / `"not_matched"`
  - Or a **numerical similarity score**

---

### Inputs

| Input        | Type    | Description                                     |
|--------------|---------|-------------------------------------------------|
| Claim ID     | String  | Unique ID of the claim                          |
| Folder ID    | String  | Folder containing media evidence                |
| User Name    | String  | Name of the person submitting the claim         |
| Description  | String  | Textual explanation of the claim incident       |

![ :( Can't load image ](/qdocs/Agent_Nodes/Claims_Processing/Claim_Image_Description_Similarity_Checker/image_Description_Similarity_Checker.png)

---

### Outputs

| Output Variable               | Description                                                       |
|-------------------------------|-------------------------------------------------------------------|
| `description_match_result`    | Result of semantic similarity between image(s) and description   |
| Example Values                | `"matched"`, `"not_matched"` or similarity score (e.g., `0.82`)  |

---

### When to Use

Use this node when you want to:

- Validate that a **claim’s written description matches its uploaded images**  
- **Flag inconsistent or suspicious claims** for manual review  
- Add **semantic visual verification** in automated insurance workflows  
- **Improve accuracy and trust** in AI-driven claim processing  

---

### Example Flow: Validate Claim Evidence Consistency

**Scenario:**  
A user submits a description: _"Rear-ended at stoplight with bumper damage."_ and uploads a photo of a dented rear bumper. You want to validate that the image matches the described event.

**Steps:**

1. **Claim Image Description Similarity Checker Node**
   ```yaml
   Claim ID: {{claim_id}}
   Folder ID: {{folder_id}}
   User Name: {{user_name}}
   Description: {{incident_description}}
   Output Variable: {{similarity_result}}