# Node Guide: Remote Python Script

---

### Overview

The **Remote Python Script** node allows you to execute Python code on a remote executor (`q-remotex`).
This is useful when you want to run custom logic, perform calculations, transform data, or validate inputs in an isolated and scalable way.

---

### What This Node Does

- Executes Python code snippets on a **remote active executor**
- Accepts input variables for dynamic use in your code
- Returns results that can be passed to other nodes
- Supports timeout configuration for safe execution

---

### Configuration Details

#### 1. Executor Selection

- Choose from the list of **active executors** available in your subscription.
- Only executors that are marked **active** can be selected.
- To create new executors or manage existing ones, refer to the **[Executors Management Page](/docs/remote-script-execution/executor-management/executor-management-page/)**.

![ :( Can't load image ](/qdocs/Remote_Script_Execution/RemotePyScript/executor-selection.png)

---

#### 2. Timeout

- Numeric field (seconds)
- Defines how long the system should wait for the execution to finish
- Prevents long-running or stuck scripts from blocking the agent

---

#### 3. Script Editor

- Write your Python code directly in the editor
- You can use input variables by referencing:

  ```python
  input_variables['variable_name']
  ```

- Always capture outputs in the **`result`** dictionary
- Do **not** use `return`

Example:

```python
import datetime

result = {}
result['generated_value'] = input_variables['user_id'] + "_" + str(datetime.datetime.now().timestamp())
```

---

#### 4. Output Handling

- Map keys from the **`result`** dictionary to output variables of the node
- These outputs can then be used by other nodes in your agent

---

### Inputs

- **Executor:** Select an active remote executor
- **Timeout:** Execution timeout in seconds
- **Script:** Python code snippet
- **Variables:** Values injected using `input_variables`

---

### Outputs

- **Result:** Key-value pairs returned in the result dictionary
- **Storage:** Mapped to output variables for further use in the agent

![ :( Can't load image ](/qdocs/Remote_Script_Execution/RemotePyScript/output-mapping.png)

---

### When to Use

Use the **Remote Python Script Node** when you need to:

- Run Python logic remotely in an isolated container
- Perform dynamic transformations or validations
- Safely handle long-running code with timeout protection
- Scale agent tasks by leveraging external execution

---

### Example Use Case

#### Scenario: Generate Unique Folder Name

**Step 1: Remote Python Script Node**

- **Executor:** Select an active executor
- **Timeout:** 30 seconds
- **Script:**

  ```python
  import datetime

  result = {}
  result['unique_name'] = input_variables['user_id'] + "_" + str(datetime.datetime.now().timestamp())
  ```

**Step 2: Capture Output**

- Map `unique_name` → `generated_filename`

**Step 3: Use in Agent**

- The generated filename can now be used in subsequent agent steps (e.g., storing files, creating resources).

---

✅ **Summary**

The Remote Python Script Node lets you execute Python code on active executors for scalability and isolation.
Executors can be managed from the **[Executors Management Page](/docs/remote-script-execution/executor-management/executor-management-page/)**.
Code runs remotely with input variable injection, timeout support, and structured output handling for smooth integration into your agent.

Got it 👍 — here’s a clean **Quick Links** section you can add at the bottom of the doc:

---

### Quick Links

- [Executors Management Page](/docs/remote-script-execution/executor-management/executor-management-page/)
- [Remote Executor (q-remotex) Docker Hub Page](https://hub.docker.com/r/qraptor/q-remotex)
