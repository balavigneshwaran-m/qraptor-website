# Node Guide: JSON Mapper

## Overview
The **JSON Mapper** node is designed to extract specific values from a JSON structure. It helps in situations where you receive a large JSON response but only need data from a few specific keys.  
This node takes in a variable that contains the JSON, applies the given extraction logic, and stores the results in output variables for use in the next steps.

## How It Works
When this node runs:
- It reads a JSON string or object stored in an input variable.
- It uses your provided expressions to extract specific values or sections.
- It maps the extracted values into output variables.
- You can also apply conditions before processing the JSON.

---

## Configuration Details

![ :( Can't load image ](/qdocs/Agent_Nodes/JSON_Mapper/json_mapper.png)

### 1. Input Variable
- Choose or pass the variable that holds the full JSON data.

![ :( Can't load image ](/qdocs/Agent_Nodes/JSON_Mapper/json_variable.png)

### 2. Upload or Paste JSON
To help with writing expressions, you can:
- Upload a sample JSON file
- Paste the JSON directly inside the node  
This allows you to preview and test your expressions easily.

![ :( Can't load image ](/qdocs/Agent_Nodes/JSON_Mapper/json_extraction.png)

### 3. Extraction Expression
Write expressions to select the keys or data you want to fetch. For example:
```text
data.user.name  
orders[0].amount
```

### 3. Extraction Expression
Expressions follow **dot notation** or **path-like structures**, depending on the shape of your JSON.

Examples:
```text
user.name
data.profile.email
orders[0].total
```
### 4. Map to Output Variable

Each extracted value should be **mapped to an output variable** so it can be reused in later nodes.

- You can create **new variables** for each mapped value.
- These variables will hold the extracted JSON values for use in the following steps of the workflow.

**Example:**

- data.user.name → user_name
- data.user.email → user_email

![ :( Can't load image ](/qdocs/Agent_Nodes/JSON_Mapper/extract_data.png)


---

### 5. Optional Condition

You can define a **condition** that must be true for the JSON parsing to happen.

- This is useful if you only want to extract data **under specific circumstances**  
  (e.g., only if a response indicates success).

**Examples:**

- status == 200
- response.success == true


If the condition is **not met**, the node will skip parsing the JSON.

## Output

This node provides **one or more output variables**, depending on how many keys you extracted.

These variables can be used in any following nodes to:

- **Send messages**
- **Trigger actions**
- **Store data**
- **Continue decision logic**

Each mapped value becomes a reusable variable, making it easy to work with targeted information from large or complex JSON structures.

## When to Use

Use the **JSON Mapper** node when you:

- Receive JSON from an API or another node
- Only need part of the JSON content
- Want to simplify complex structures into smaller, usable variables
- Need to apply conditional logic before extracting data

### Example Flow: Extract User Info from API Response

## Scenario
An API returns a full user profile in JSON format. You only need the user’s name, email, and ID for the next steps.

### Flow Steps

**1. Call API (GET Request)**  
Fetch user details from an external system.

**2. JSON Mapper**  
**Input:** The JSON response from the API

**Expressions:**
- `user.id` → `userId`
- `user.name` → `userName`
- `user.email` → `userEmail`

**Output:**  
Variables `userId`, `userName`, `userEmail`

**3. Use Extracted Data**  
These variables are then used to:
- Send a message  
- Log data  
- Trigger another process  

---

### Summary of the Flow
- An API returns detailed JSON data  
- JSON Mapper extracts only needed fields  
- Extracted values are passed forward in the workflow