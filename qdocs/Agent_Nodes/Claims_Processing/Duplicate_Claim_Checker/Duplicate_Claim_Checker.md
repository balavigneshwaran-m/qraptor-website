### Node Guide: Duplicate Claim Checker

---

### Overview

The **Duplicate Claim Checker** node is purpose-built for **insurance claims workflows** to detect if a claim has been previously submitted, based on **media content** like images or documents. It enhances **fraud prevention** by automatically checking whether media files have been reused across claims.

---

### What This Node Does

- Scans the **uploaded media** (images, PDFs, etc.) associated with a new claim  
- Compares these files against **historical claim submissions** (from the same or different users)  
- **Flags potential duplicates** if similar files have already been used  
- Stores the result in a variable for use in downstream decision-making logic

---

### Configuration Fields

#### 1. **Claim ID**
- Unique ID for the current claim  
- Supports static input or dynamic variable (e.g., `{{claim_id}}`)  
- Used for tracking and context

#### 2. **Folder ID**
- ID of the folder containing **media files for the current claim**  
- This folder is scanned and compared to past claim folders  
- Example: `{{claim_folder_id}}`

#### 3. **User Name**
- Name of the claimant  
- Helps cross-reference repeated submissions by the same individual

#### 4. **Output Variable**
- Variable to store the duplication result  
- Example: `duplicate_check_result`  
- Output format can be:
  - `"duplicate"` / `"not_duplicate"`
  - `true` / `false` (depending on implementation)

---

### Inputs

| Input       | Type    | Description                                       |
|-------------|---------|---------------------------------------------------|
| Claim ID    | String  | Unique identifier for the current claim           |
| Folder ID   | String  | Folder where media files are stored               |
| User Name   | String  | Name of the person submitting the claim           |

![ :( Can't load image ](/qdocs/Agent_Nodes/Claims_Processing/Duplicate_Claim_Checker/Duplicate_Claim_Checker.png)

---

### Outputs

| Output Variable             | Description                                           |
|-----------------------------|-------------------------------------------------------|
| `duplicate_check_result`    | Flag indicating whether the claim media is duplicate |
| Possible Values             | `"duplicate"`, `"not_duplicate"` or `true` / `false` |

---

### When to Use

Use this node to:

- **Detect duplicate claims** involving identical or similar media files  
- **Prevent fraudulent re-submissions** using previously uploaded evidence  
- **Validate claim originality** based on supporting documentation  
- Automate media-level duplicate checks before approval

---

### Example Flow: Detect Reused Claim Media

**Scenario:**  
A user submits a claim with media files located in a folder. The system must check if these files have been previously used in any other claim.

**Steps:**

1. **Duplicate Claim Checker Node**
   ```yaml
   Claim ID: {{claim_id}}
   Folder ID: {{folder_id}}
   User Name: {{user_name}}
   Output Variable: duplicate_check_result