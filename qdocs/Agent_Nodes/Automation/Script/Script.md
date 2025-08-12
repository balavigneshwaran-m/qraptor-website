### Node Guide: Script

---

### Overview
The **Script** node allows you to execute custom code within your workflow using supported programming languages. This is useful for applying logic, performing calculations, transforming data, validating inputs, or generating values dynamically.

---

### What This Node Does
- Executes a code snippet in your chosen language  
- Can access flow variables using `{{variable_name}}` syntax  
- Returns the result of the code execution (if desired), to be stored in a variable for later use  

---

### Configuration Details

#### 1. Language Selection
Choose from supported languages via dropdown: 
- Python  

(Currently only Python is supported)

![ :( Can't load image ](/qdocs/Agent_Nodes/Automation/Script/Script_Node_Image_1.png)


#### 2. Script Editor
- Write the code snippet directly in the built-in editor  
- Use **workflow variables** inside the script by referencing `{{variable_name}}`  
- Access to built-in functions and modules depending on language  
- Supports inserting predefined code snippets for convenience  

![ :( Can't load image ](/qdocs/Agent_Nodes/Automation/Script/Script_Node_Image_2.png)

#### 3. Output Handling
- Optional: Store the result of the script in a **variable**  
- This output can then be used by downstream nodes (e.g., Send, Document Generation, etc.)

---

### Inputs

- **Script:** Directly type your logic in the editor  
- **Variables:** Use variables injected via `{{variable_name}}` syntax  

---

### Outputs

- **Result:** Return value from the script  
- **Storage:** Captured in a specified variable if configured  

---

### When to Use

Use the Script node when you need to:
- Perform dynamic calculations or aggregations  
- Apply conditional logic or validation rules  
- Format strings, dates, numbers, etc.  
- Generate IDs, filenames, or custom labels  
- Derive new values from existing variables  
- Integrate logic not available through standard nodes  

---

### Example Use Case

#### Scenario: Generate Unique File Name

**Goal:** Combine user ID and current timestamp to create a file name.

**Step 1: Script Node**
- **Language:** Python  
- **Script:**
  ```
  userId = {{user_id}}
  timestamp = Date.now()
  return userId + timestamp
  ```

**Step 2: Upload Node**

Uses generated_filename as the destination file name



**Summary**

The Script node is a flexible execution block where you can run JavaScript, Python, Java, or C++ code inside your workflow. It supports variable injection, standard libraries, and lets you optionally return output for further use.